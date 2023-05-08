using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Localization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System;
using System.Reflection;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Filters;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    [TanyoLayoutActionFilter]
    [ResponseCache(Location = ResponseCacheLocation.None, CacheProfileName = "Default")]
    public abstract class BaseController : Controller
    {
        private readonly IStringLocalizer _localizer;
        protected ILogger<BaseController> _logger;
        protected IStringLocalizer _sharedLocalizer;
        protected IConfiguration _configuration;
        public DefaultLayout Layout { get; set; }

        public BaseController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IStringLocalizerFactory factory)
        {
            var type = typeof(SharedResource);
            var assemblyName = new AssemblyName(type.GetTypeInfo().Assembly.FullName);

            _localizer = factory.Create(type);
            _sharedLocalizer = factory.Create("SharedResource", assemblyName.Name);
            _logger = logger;

            Layout = new DefaultLayout(_sharedLocalizer, navLinksService, socialLinksService, copyLinksService, companiesService);
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