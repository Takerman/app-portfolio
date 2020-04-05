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
    public class PortfolioController : BaseController
    {
        public PortfolioController(ILogger<BaseController> logger,
            NavLinksService navLinksService) : base(logger, navLinksService)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Portfolio | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Portfolio";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Portfolio", Label = "Portfolio" },
            };

            var model = new Models.Partials.Portfolio();
            return View(model);
        }

        public IActionResult Project(string name)
        {
            Layout.Head.Title = name + " | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Portfolio";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Portfolio", Label = "Portfolio" },
                new NavLink(){ Action = "Project", Controller = "Portfolio", Data = new { name = name }, Label = name },
            };
            return View(name);
        }
    }
}