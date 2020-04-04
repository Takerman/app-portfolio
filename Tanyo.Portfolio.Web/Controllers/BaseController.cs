using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Localization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System;
using System.Linq;
using System.Reflection;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Models.Filters;
using Takerman.Portfolio.Web.Models.Services;
using Takerman.Portfolio.Web.Resources;

namespace Takerman.Portfolio.Web.Areas.Tanyo.Controllers
{
    [TanyoLayoutActionFilter]
    public abstract class BaseController : Controller
    {
        private readonly IStringLocalizer _localizer;
        private readonly IHtmlLocalizer<SharedResource> _sharedLocalizer;

        public Layout Layout { get; set; }

        protected ILogger<BaseController> _logger;

        public string Area { get; set; }

        public BaseController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<BaseController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory)
        {
            _localizer = localizer;
            _sharedLocalizer = sharedLocalizer;

            var type = typeof(SharedResource);
            var assemblyName = new AssemblyName(type.GetTypeInfo().Assembly.FullName);
            _localizer = factory.Create("SharedResource", assemblyName.Name);

            this.Area = "Tanyo";

            Layout = new Layout();
            Layout.Head.Title = "Tanyo Ivanov";
            Layout.Header.ImageUrl = "/img/profile/logo.png";
            Layout.Header.NavigationLinks = navLinksService.GetNavLinks().ToList();

            Layout.Footer.ImageUrl = "/img/profile/logo2.png";
            Layout.Footer.NavigationLinks = Layout.Header.NavigationLinks;
            Layout.Footer.SocialLinks = navLinksService.GetSocialLinks().ToList();
            Layout.Footer.CopyLink = navLinksService.GetCopyLinks().FirstOrDefault();

            Layout.Brands = navLinksService.GetBrands().ToList();

            _logger = logger;
        }

        [HttpPost]
        public IActionResult SetLanguage(string culture, string returnUrl)
        {
            Response.Cookies.Append(
                CookieRequestCultureProvider.DefaultCookieName,
                CookieRequestCultureProvider.MakeCookieValue(new RequestCulture(culture)),
                new CookieOptions { Expires = DateTimeOffset.UtcNow.AddYears(1) }
            );

            return LocalRedirect(returnUrl);
        }
    }
}