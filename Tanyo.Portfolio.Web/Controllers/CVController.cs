using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class CvController(ILogger<BaseController> _logger,
        INavLinksService _navLinksService,
        ISocialLinksService _socialLinksService,
        ICopyLinksService _copyLinksService,
        ICompaniesService _companiesService,
        IStringLocalizerFactory _factory) : BaseController(_logger, _navLinksService, _socialLinksService, _copyLinksService, _companiesService, _factory)
    {
        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["CV | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["CV"];
            Layout.Banner.NavLinks =
            [
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "CV", Label = _sharedLocalizer["CV"] },
            ];

            return View();
        }
    }
}