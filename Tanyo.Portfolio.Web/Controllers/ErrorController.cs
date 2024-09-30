﻿using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Diagnostics;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Areas.Tanyo.Controllers;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Controllers
{
    public class ErrorController(ILogger<BaseController> logger,
        INavLinksService navLinksService,
        ISocialLinksService socialLinksService,
        ICopyLinksService copyLinksService,
        ICompaniesService companiesService,
        IStringLocalizerFactory factory) : BaseController(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
    {
        [AllowAnonymous]
        [Route("Error")]
        [Route("Error/{code:int}")]
        [Route("{*url}", Order = 999)]
        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error(int code = 0)
        {
            var exceptionDetails = HttpContext.Features.Get<IExceptionHandlerPathFeature>();

            _logger.LogError($"The path {exceptionDetails.Path} threw an exception {exceptionDetails.Error}");

            var model = new ErrorModel
            {
                RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier,
                Code = code
            };

            return View(model);
        }
    }
}