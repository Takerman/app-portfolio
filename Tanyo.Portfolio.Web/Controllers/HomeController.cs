using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class HomeController : BaseController
    {
        private IBlogService _blogService;

        public HomeController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            IBlogService blogService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, factory)
        {
            _blogService = blogService;
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Home | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner = null;

            var model = new IndexModel()
            {
                Stats = new Stats(),
                Blog = _blogService.GetBlogItemsReversed(3)
            };

            return View(model);
        }
    }
}