using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class HomeController : BaseController
    {
        public HomeController(ILogger<BaseController> logger,
            NavLinksService navLinksService) : base(logger, navLinksService)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Home | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner = null;
            return View();
        }
    }
}