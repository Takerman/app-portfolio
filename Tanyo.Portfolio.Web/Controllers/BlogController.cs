using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Models.Services;
using Takerman.Portfolio.Web.Resources;

namespace Takerman.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class BlogController : BaseController
    {
        public BlogController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<BlogController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory) : base(logger, navLinksService, localizer, sharedLocalizer, factory)
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