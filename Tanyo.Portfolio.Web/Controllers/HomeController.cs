using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Linq;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class HomeController : BaseController
    {
        private IStatsService _statsService;
        private IBlogService _blogService;

        public HomeController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IStatsService statsService,
            IBlogService blogService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
            _statsService = statsService;
            _blogService = blogService;
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Home | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner = null;

            var model = new IndexModel()
            {
                CustomerStats = _statsService.GetCustomerStats().ToList(),
                DevStats = _statsService.GetDevStats().ToList(),
                Blog = new Blog()
                {
                    SeeAllVisible = true,
                    BlogItemsMini = _blogService.GetBlogItemsReversed(3).ToList()
                }
            };

            return View("Index", model);
        }
    }
}