using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
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
            NavLinksService navLinksService) : base(logger, navLinksService)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "CV | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "CV";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "CV", Label = "CV" },
            };
            return View();
        }
    }
}