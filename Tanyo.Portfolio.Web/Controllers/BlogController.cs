using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class BlogController(ILogger<BlogController> _logger,
        INavLinksService _navLinksService,
        ISocialLinksService _socialLinksService,
        ICopyLinksService _copyLinksService,
        ICompaniesService _companiesService,
        IBlogService _blogService,
        IStringLocalizerFactory _factory) : BaseController(_logger, _navLinksService, _socialLinksService, _copyLinksService, _companiesService, _factory)
    {
        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Blog | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Blog"];
            Layout.Banner.NavLinks =
            [
                new(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new(){ Action = "Index", Controller = "Blog", Label = _sharedLocalizer["Blog"] },
            ];

            var model = new Blog
            {
                SeeAllVisible = false,
                BlogItemsMini = _blogService.GetBlogItemsReversed()
            };

            return View(model);
        }

        public IActionResult Post(string name)
        {
            Layout.Head.Title = name + " | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = _sharedLocalizer["Blog"];
            Layout.Banner.NavLinks =
            [
                new(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new(){ Action = "Index", Controller = "Blog", Label = _sharedLocalizer["Blog"] },
                new(){ Action = "Post", Controller = "Blog", Label = name, Data = new { name = name } },
            ];
            return View("post-" + name);
        }
    }
}