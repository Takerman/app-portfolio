using Cofoundry.Core.Mail;

namespace Tanyo.Portfolio.Web.Domain
{
    /// <summary>
    /// Cofoundry includes a framework for sending mail based around template
    /// classes and view files rendered using RazorEngine.
    ///
    /// For more information see https://www.cofoundry.org/docs/framework/mail
    /// </summary>
    public class NewUserWelcomeMailTemplate : IMailTemplate
    {
        public string ViewFile
        {
            get { return "~/MailTemplates/NewUserWelcomeMail"; }
        }

        public string Subject
        {
            get { return "Welcome to SPA Cats!"; }
        }

        #region custom properties

        public string FirstName { get; set; }

        #endregion custom properties
    }
}