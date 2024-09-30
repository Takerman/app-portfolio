using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using System.Linq;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class SkillsController(ILogger<BaseController> _logger,
        INavLinksService _navLinksService,
        ISocialLinksService _socialLinksService,
        ICopyLinksService _copyLinksService,
        ICompaniesService _companiesService,
        IPricingService _pricingService,
        ISkillsService _skillsService,
        IStringLocalizerFactory _factory) : BaseController(_logger, _navLinksService, _socialLinksService, _copyLinksService, _companiesService, _factory)
    {
        public IActionResult GetTable(int employmentTypeId, int locationId)
        {
            var prices = _pricingService.GetPrices().Where(x => x.Type == employmentTypeId && x.Location == locationId).ToList();

            var model = new PricingTableModel(employmentTypeId)
            {
                Prices = prices
            };

            return PartialView("PricingTable", model);
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Skills | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Skills"];
            Layout.Banner.NavLinks =
            [
                new(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new(){ Action = "Index", Controller = "Skills", Label = _sharedLocalizer["Skills"] }
            ];

            var skills = _skillsService.GetSkills().ToList();
            // var prices = _pricingService.GetPrices().ToList();

            var model = new PricingModel()
            {
                Skills = skills
            };

            return View(model);
        }
    }
}