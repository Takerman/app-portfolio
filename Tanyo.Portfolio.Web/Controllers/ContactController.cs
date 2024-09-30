using Griesoft.AspNetCore.ReCaptcha;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System;
using System.Threading.Tasks;
using Takerman.Mail;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class ContactController(ILogger<BaseController> logger,
        INavLinksService navLinksService,
        ISocialLinksService socialLinksService,
        ICopyLinksService copyLinksService,
        ICompaniesService companiesService,
        IStringLocalizerFactory _factory,
        IMailService _mailService) : BaseController(logger, navLinksService, socialLinksService, copyLinksService, companiesService, _factory)
    {
        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Contact | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Contact"];
            Layout.Banner.NavLinks =
            [
                new() { Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new() { Action = "Index", Controller = "Contact", Label = _sharedLocalizer["Contact"] },
            ];
            return View();
        }

        [HttpPost]
        [ValidateRecaptcha(Action = "submit")]
        public async Task<IActionResult> Index(MessageModel model)
        {
            try
            {
                if (!ModelState.IsValid)
                    return View(model);

                _logger.LogInformation(model.Name);

                var mailMessageDto = new MailMessageDto()
                {
                    Body = $"{model.Name} sent with email: {model.Email} sent a message: <br /> <br/>{model.Message}",
                    From = model.Email,
                    Subject = model.Subject,
                    To = "contact@takerman.net",
                    Name = model.Name
                };

                await _mailService.SendToQueue(mailMessageDto);

                return View("ThankYou");
            }
            catch (Exception ex)
            {
                var error = $"Exception: {ex.Message + (ex.InnerException != null && !string.IsNullOrEmpty(ex.InnerException.Message) ? ex.InnerException.Message : string.Empty)}";
                _logger.LogError(error);
                throw;
            }
        }
    }
}