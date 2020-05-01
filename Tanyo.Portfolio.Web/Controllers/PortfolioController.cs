using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using System.Linq;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class PortfolioController : BaseController
    {
        private readonly ProjectsService _projectsService;

        public PortfolioController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            ProjectsService projectsService) : base(logger, navLinksService)
        {
            _projectsService = projectsService;
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

            var model = _projectsService.GetAll().Where(x => x.IsPrivate == false).ToList();
            return View(model);
        }

        /*
        public IActionResult Confidential()
        {
            Layout.Head.Title = "Portfolio | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Portfolio";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Portfolio", Label = "Portfolio" },
                new NavLink(){ Action = "Confidential", Controller = "Portfolio", Label = "Confidential" }
            };

            var model = _projectsService.GetAll().ToList();
            return View(model);
        }
        */

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