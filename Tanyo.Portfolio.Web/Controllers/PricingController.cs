using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using System.Linq;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Partials;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class PricingController : BaseController
    {
        private readonly IStringLocalizer<PricingController> _localizer;
        private readonly SkillsService _skillsService;
        private readonly PricingService _pricingService;

        public PricingController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<PricingController> localizer,
            SkillsService skillsService,
            PricingService pricingService,
            IStringLocalizer<SharedResource> sharedLocalizer) : base(logger, navLinksService, sharedLocalizer)
        {
            _localizer = localizer;
            _skillsService = skillsService;
            _pricingService = pricingService;
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