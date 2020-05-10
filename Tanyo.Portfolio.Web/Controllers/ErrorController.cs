using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Tanyo.Portfolio.Web.Areas.Tanyo.Controllers;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Resources;

namespace Tanyo.Portfolio.Web.Controllers
{
    public class ErrorController : BaseController
    {
        private IStringLocalizer<AboutController> _localizer;

        public ErrorController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<AboutController> localizer,
            IStringLocalizer<SharedResource> sharedLocalizer) : base(logger, navLinksService, sharedLocalizer)
        {
            _localizer = localizer;
        }

        [AllowAnonymous]
        [Route("Error")]
        [Route("Error/{code:int}")]
        [Route("{*url}", Order = 999)]
        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error(int code = 0)
        {
            var exceptionDetails = HttpContext.Features.Get<IExceptionHandlerPathFeature>();

            _logger.LogError($"The path {exceptionDetails.Path} threw an exception {exceptionDetails.Error}");

            var model = new ErrorViewModel
            {
                RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier,
                Code = code
            };

            return View(model);
        }
    }
}