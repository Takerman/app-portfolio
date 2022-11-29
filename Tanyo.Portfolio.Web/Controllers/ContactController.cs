using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Net;
using System.Net.Mail;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class ContactController : BaseController
    {
        public ContactController(ILogger<BaseController> logger,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService,
            IConfiguration configuration,
            IStringLocalizerFactory factory) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
            _configuration = configuration; 
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

            var to = new MailAddress(_configuration["Smtp:UserName"]);
            var from = new MailAddress(model.Email);

            var email = new MailMessage(from, to)
            {
                Subject = model.Subject,
                Body = "From: " + model.Email + ": " + Environment.NewLine + model.Message
            };

            var smtp = new SmtpClient
            {
                Host = _configuration["Smtp:Server"],
                Port = int.TryParse(_configuration["Smtp:Port"], out int port) ? port : 587,
                Credentials = new NetworkCredential(_configuration["Smtp:UserName"], _configuration["Smtp:Password"]),
                DeliveryMethod = SmtpDeliveryMethod.Network,
                EnableSsl = true
            };

            try
            {
                smtp.Send(email);
            }
            catch (SmtpException ex)
            {
                Console.WriteLine(ex.ToString());
            }

            return View(model);
        }
    }
}