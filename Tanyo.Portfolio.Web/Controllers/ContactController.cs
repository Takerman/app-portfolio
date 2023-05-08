using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using Microsoft.Extensions.Options;
using System;
using System.Collections.Generic;
using System.Net;
using System.Net.Mail;
using Takerman.Mail;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class ContactController : BaseController
    {
        private readonly IMailService _mailService;
        private readonly IOptions<RabbitMqConfig> _rabbitMqConfig;

        public ContactController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IConfiguration configuration,
            IStringLocalizerFactory factory,
            IMailService mailService,
            IOptions<RabbitMqConfig> rabbitMqConfig) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
            _configuration = configuration;
            _mailService = mailService;
            _rabbitMqConfig = rabbitMqConfig;
        }

        public IActionResult Index()
        {
            Layout.Head.Title = _sharedLocalizer["Contact | " + Layout.Head.Title + " | .NET Developer"];
            Layout.Banner.Title = _sharedLocalizer["Contact"];
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = _sharedLocalizer["Home"] },
                new NavLink(){ Action = "Index", Controller = "Contact", Label = _sharedLocalizer["Contact"] },
            };
            return View();
        }

        [HttpPost]
        public IActionResult Index(MessageModel model)
        {
            _logger.LogInformation(model.Name);

            var mailMessageDto = new MailMessageDto()
            {
                Body = $"Email: {model.Email}. From tanyoivanov.net. Message: {model.Message}",
                From = model.Email,
                Subject = model.Subject,
                To = "tivanov@takerman.net"
            };

            _mailService.SendToQueue(mailMessageDto, _rabbitMqConfig.Value);

            return View("ThankYou");
        }
    }
}