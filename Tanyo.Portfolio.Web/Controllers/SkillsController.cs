using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using System.Linq;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Models.Services;
using Takerman.Portfolio.Web.Resources;

namespace Takerman.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class SkillsController : BaseController
    {
        private readonly SkillsService _skillsService;

        public SkillsController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            SkillsService skillsService,
            IStringLocalizer<SkillsController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory) : base(logger, navLinksService, localizer, sharedLocalizer, factory)
        {
            _skillsService = skillsService;
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Skills | " + Layout.Head.Title + " | .NET Developer";
            Layout.Banner.Title = "Skills";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Skills", Label = "Skills" },
            };

            var model = _skillsService.GetSkills().ToList();

            return View(model);
        }
    }
}