using Microsoft.Extensions.Localization;
using Tanyo.Portfolio.BLL.Services.Interfaces;

namespace Tanyo.Portfolio.Web.Models
{
    public class DefaultLayout
    {
        public DefaultLayout()
        {
            Head = new Head();

            Header = new Header();

            Banner = new Banner();

            Companies = new Companies();

            Footer = new Footer();
        }

        public DefaultLayout(IStringLocalizer sharedLocalizer,
            INavLinksService navLinksService) : this()
        {
            Head.Title = sharedLocalizer["Tanyo Ivanov"];

            Header.ImageUrl = "/img/profile/logo.png";
            Header.NavigationLinks = navLinksService.GetLinks().ToList();

            Footer.ImageUrl = "/img/profile/logo2.png";
            Footer.NavigationLinks = Header.NavigationLinks;
        }

        public DefaultLayout(IStringLocalizer sharedLocalizer,
            INavLinksService navLinksService,
            ISocialLinksService socialLinksService,
            ICopyLinksService copyLinksService,
            ICompaniesService companiesService) : this(sharedLocalizer, navLinksService)
        {
            Footer.SocialLinks = socialLinksService.GetLinks().ToList();
            Footer.CopyLink = copyLinksService.GetLinks().FirstOrDefault();

            Companies = new Companies(); //.Data = companiesService.GetCompanies().ToList();
        }

        public Header Header { get; set; }

        public Footer Footer { get; set; }

        public Companies Companies { get; set; }

        public Head Head { get; set; }

        public Banner Banner { get; set; }
    }
}