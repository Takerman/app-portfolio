using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class BlogController : BaseController
    {
        public BlogController(ILogger<BaseController> logger,
            NavLinksService navLinksService) : base(logger, navLinksService)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Blog | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Blog";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Blog", Label = "Blog" },
            };
            return View();
        }

        public IActionResult Post(string name)
        {
            Layout.Head.Title = name + " | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Blog";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Blog", Label = "Blog" },
                new NavLink(){ Action = "Post", Controller = "Blog", Label = name, Data = new { area = "Tanyo", name = name } },
            };
            return View("post-" + name);
        }
    }
}