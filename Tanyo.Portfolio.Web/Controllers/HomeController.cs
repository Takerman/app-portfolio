using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Models.Services;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class HomeController : BaseController
    {
        public HomeController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, factory)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Home | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner = null;
            return View();
        }
    }
}