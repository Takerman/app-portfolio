using Microsoft.Extensions.Localization;
using Tanyo.Portfolio.BLL.Services.Interfaces;

namespace Tanyo.Portfolio.Web.Models
{
    public class DefaultLayout
    {
        public DefaultLayout()
        {
            Header = new Header();

            Footer = new Footer();

            Companies = new Companies();

            Head = new Head();

            Banner = new Banner();
        }

        public DefaultLayout(IStringLocalizer sharedLocalizer,
            INavLinksService navLinksService) : this()
        {
            Head.Title = sharedLocalizer["Tanyo Ivanov"];
            Header.ImageUrl = "/img/profile/logo.png";
            Header.NavigationLinks = navLinksService.GetNavLinks().ToList();

            Footer.ImageUrl = "/img/profile/logo2.png";
            Footer.NavigationLinks = Header.NavigationLinks;
            Footer.SocialLinks = navLinksService.GetSocialLinks().ToList();
            Footer.CopyLink = navLinksService.GetCopyLinks().FirstOrDefault();

            Companies.Data = navLinksService.GetCompanies().ToList();
        }

        public Header Header { get; set; }

        public Footer Footer { get; set; }

        public Companies Companies { get; set; }

        public Head Head { get; set; }

        public Banner Banner { get; set; }
    }
}