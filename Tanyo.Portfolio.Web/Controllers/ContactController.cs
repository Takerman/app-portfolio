using Microsoft.AspNetCore.Mvc;
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
            IStringLocalizerFactory factory) : base(logger, navLinksService, socialLinksService, copyLinksService, companiesService, factory)
        {
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

            MailAddress to = new MailAddress("tivanov@takerman.net");
            MailAddress from = new MailAddress(model.Email);

            MailMessage email = new MailMessage(from, to);
            email.Subject = model.Subject;
            email.Body = "From: " + model.Email + ": " + model.Message;

            SmtpClient smtp = new SmtpClient();
            smtp.Host = "smtp.gmail.com";
            smtp.Port = 587;
            smtp.Credentials = new NetworkCredential("tivanov@takerman.net", _configuration["Mail.Password"]);
            smtp.DeliveryMethod = SmtpDeliveryMethod.Network;
            smtp.EnableSsl = true;

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