using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class BlogController : BaseController
    {
        private IBlogService _blogService;

        public BlogController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IBlogService blogService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
            _blogService = blogService;
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Blog | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Blog"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "Blog", Label = _sharedLocalizer["Blog"] },
            };

            var model = new Blog();
            model.SeeAllVisible = false;
            model.BlogItemsMini = _blogService.GetBlogItemsReversed();

            return View(model);
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