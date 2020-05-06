using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class BlogController : BaseController
    {
        public BlogController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<BlogController> localizer,
            IStringLocalizer<SharedResource> sharedLocalizer) : base(logger, navLinksService, sharedLocalizer)
        {
            _localizer = localizer;
        }

        private IStringLocalizer<BlogController> _localizer;

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Blog | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Blog"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "Blog", Label = _sharedLocalizer["Blog"] },
            };
            return View();
        }

        public IActionResult Post(string name)
        {
            Layout.Head.Title = name + " | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = _sharedLocalizer["Blog"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "Blog", Label = _sharedLocalizer["Blog"] },
                new NavLink(){ Action = "Post", Controller = "Blog", Label = name, Data = new { name = name } },
            };
            return View("post-" + name);
        }
    }
}