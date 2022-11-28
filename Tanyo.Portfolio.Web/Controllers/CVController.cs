using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class CvController : BaseController
    {
        public CvController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, factory)
        {
        }

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