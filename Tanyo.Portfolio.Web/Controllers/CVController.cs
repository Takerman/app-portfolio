using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class CvController : BaseController
    {
        public CvController(
            ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<CvController> localizer,
            IStringLocalizer<SharedResource> sharedLocalizer) : base(logger, navLinksService, sharedLocalizer)
        {
            _localizer = localizer;
        }

        private IStringLocalizer<CvController> _localizer;

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["CV | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["CV"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "CV", Label = _sharedLocalizer["CV"] },
            };
            return View();
        }
    }
}