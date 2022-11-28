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
    public class PricingController : BaseController
    {
        private readonly ISkillsService _skillsService;
        private readonly IPricingService _pricingService;

        public PricingController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IPricingService pricingService,
            ISkillsService skillsService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
            _skillsService = skillsService;
            _pricingService = pricingService;
        }

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
            Layout.Head.Title = _sharedLocalizer["Pricing | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Pricing"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "Pricing", Label = _sharedLocalizer["Pricing"] },
            };

            var skills = _skillsService.GetSkills().ToList();
            var prices = _pricingService.GetPrices().ToList();

            var model = new PricingModel()
            {
                Skills = skills,
                Prices = prices
            };

            return View(model);
        }
    }
}