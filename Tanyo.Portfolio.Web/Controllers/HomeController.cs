using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.BLL.Services.Interfaces;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class HomeController : BaseController
    {
        private IBlogService _blogService;

        public HomeController(ILogger<BaseController> logger,
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
            Layout.Head.Title = _sharedLocalizer["Home | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner = null;
            return View();
        }
    }
}