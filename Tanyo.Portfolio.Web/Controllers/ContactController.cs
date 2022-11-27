using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Net.Mail;
using System.Net;
using Tanyo.Portfolio.Web.Models;
using Tanyo.Portfolio.Web.Models.Services;
using Tanyo.Portfolio.Web.Models.ViewModels;

namespace Tanyo.Portfolio.Web.Areas.Tanyo.Controllers
{
    public class ContactController : BaseController
    {
        public ContactController(ILogger<BaseController> logger,
            NavLinksService navLinksService,
            IStringLocalizerFactory factory) : base(logger, navLinksService, factory)
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
            smtp.Credentials = new NetworkCredential("tivanov@takerman.net", "ybpetvbqcuxjsolw");
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