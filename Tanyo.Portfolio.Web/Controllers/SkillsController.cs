using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using System.Linq;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class SkillsController : BaseController
    {
        private readonly SkillsService _skillsService;

        public SkillsController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            SkillsService skillsService) : base(logger, navLinksService)
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