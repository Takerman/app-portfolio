// The following code uses work of the code from the WP Cloudflare Super Page Cache plugin
// Default cookie prefixes for cache bypassing
const DEFAULT_BYPASS_COOKIES = [
  "wp-",
  "wordpress_logged_in_",
  "comment_",
  "woocommerce_",
  "wordpress_sec_",
  "yith_wcwl_products",
  "edd_items_in_cart",
  "it_exchange_session_",
  "wordpresspass_",
  "comment_author",
  "dshack_level",
  "wordpressuser_",
  "auth",
  "noaffiliate_",
  "mp_session",
  "mp_globalcart_",
];
const THIRDPARTY_PARAMETERS = [
  'fbclid',
  'fb_action_ids',
  'fb_action_types',
  'fb_source',
  '_ga',
  'age-verified',
  'ao_noptimize',
  'usqp',
  'cn-reloaded',
  'klaviyo',
  'amp',
  'gclid',
  'utm_source',
  'utm_medium',
  'utm_campaign',
  'utm_content',
  'utm_term',
];

function remove_third_party_parameters(event) {

  // Fetch the Request URL from the event and parse it for better handling
  const requestedURL = new URL(event.request.url);

  // List of query parameters we need to remove
  const third_party_parameters = THIRDPARTY_PARAMETERS;

  // Loop through the queries and check if we have any present in the URL, and remove them
  third_party_parameters.forEach((queryParam) => {
    // Create regex to test the url for the parameters we are looking
    const check_parameters = new RegExp('(&?)(' + queryParam + '=\\w+)', 'g');

    // Check if the url has these parameters
    if (check_parameters.test(requestedURL.search)) {
      // If the url has any remove them
      const urlSearchParams = requestedURL.searchParams;
      urlSearchParams.delete(queryParam);
    }

  });

  return requestedURL;
}

async function handleRequest(event) {

  const request = event.request;
  const requestURL = remove_third_party_parameters(event);
  const cookieHeader = request.headers.get('cookie');
  const reqDetails = {
    'contentTypeHTML': false
  };
  //Bypass cache based on request method different from GET & HEAD
  const allowedRequestMethods = ['GET', 'HEAD'];
  let response = false;
  let bypassCache = false;
  let bypassCookies = DEFAULT_BYPASS_COOKIES;


  if (!bypassCache && request) {
    if (!allowedRequestMethods.includes(request.method)) {
      bypassCache = true;
    }
  }

  // BYPASS the cache for WP Admin HTML Requests & files from that directoryt & API endpoints.
  const accept = request.headers.get('Accept');

  if (!bypassCache && accept) {

    // Paths that should be bypassed.
    const bypass_cache_paths = new RegExp(/(\/((wp-admin)|(wp-json)|(wc-api)|(edd-api))\/)/g);
    // Files that should be bypassed.
    const bypass_file_ext = new RegExp(/\.(xsl|xml)$/);

    // Make sure that the request has text/html.
    if (accept.includes('text/html')) {
      reqDetails.contentTypeHTML = true;

      // Check if the request URL is an admin URL
      if (bypass_cache_paths.test(requestURL.pathname)) {
        bypassCache = true;

      }
    }

    if (bypass_file_ext.test(requestURL.pathname)) {
      // Bypass the request since these paths must be accessed from the origin and not cached. We also make sure that we do not cache any sitemaps.
      bypassCache = true;

    }
  }

  // Check if we have to bypass because of cookies (only for html request)
  if (!bypassCache && reqDetails.contentTypeHTML && cookieHeader && cookieHeader.length > 0 && bypassCookies.length > 0 ) {

    // Separate the request cookies by semicolon and create an Array
    const cookies = cookieHeader.split(';');

    // Check if we have a match.
    for( let cookie of cookies ) {

      for( let prefix of bypassCookies ) {

        if( cookie.trim().startsWith(prefix) ) {
          bypassCache = true;
          break;
        }

      }

      if (bypassCache) {
        break;
      }

    }

  }

  // If the request has not been bypassed check for it in the CF Edge.
  if (!bypassCache) {

    // Check if the Request present in the CF Edge Cache
    const cacheKey = new Request(requestURL, request);
    const cache = caches.default;

    // Try to fetch the request from the zone's cache
    response = await cache.match(cacheKey);

    if (response) {

      // If the response exist no actions are needed. Build the response and set the headers.
      response = new Response(response.body, response);
      response.headers.set('SG-Optimizer-Worker-Status', 'hit');

    } else {

      // If the response is not present at the edge, fetch it from the origin.
      const fetchedResponse = await fetch(request);
      response = new Response(fetchedResponse.body, fetchedResponse);

      // Check if the response is cached and if needs to be bypassed. If not cached make sure we put it in the cache.
      if (!bypassCache) {
        // If the response is different add it to the cache. More info: https://developers.cloudflare.com/workers/runtime-apis/cache#put
        if (response.status !== 206) {
          // Set the worker status as miss and put the item in CF cache
          response.headers.set('SG-Optimizer-Worker-Status', 'miss');

          // Add page in cache using cache.put()
          event.waitUntil(cache.put(cacheKey, response.clone()));

        } else {

          // If the response is 206 cache it with cacheEverything set to TRUE. Info: https://developers.cloudflare.com/workers/runtime-apis/request#requestinitcfproperties.
          response = await fetch(request, {
            cf: {
              cacheEverything: true
            }
          });
          response = new Response(response.body, response);

          // Set the worker status as miss and put the item in CF cache
          response.headers.set('SG-Optimizer-Worker-Status', 'miss');

        }
      } else {

        // BYPASS the request and add our custom headers
        response.headers.set('SG-Optimizer-Worker-Status', 'bypass');
        response.headers.set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

      }

    }

  } else {

    // Make request to the origin.
    const bypassedResponse = await fetch(request);
    response = new Response(bypassedResponse.body, bypassedResponse);

    // Add the bypass headers.
    response.headers.set('SG-Optimizer-Worker-Status', 'bypass');
    response.headers.set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

  }

  return response;
}

addEventListener('fetch', event => {

  try {
    return event.respondWith(handleRequest(event));
  } catch (e) {
    return event.respondWith(new Response('Error thrown ' + e.message));
  }

});
