using Microsoft.Extensions.Localization;
using Tanyo.Portfolio.BLL.Services.Interfaces;

namespace Tanyo.Portfolio.Web.Models
{
    public class DefaultLayout
    {
        public DefaultLayout(IStringLocalizer sharedLocalizer, INavLinksService navLinksService)
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

        public Header Header { get; set; } = new Header();

        public Footer Footer { get; set; } = new Footer();

        public Companies Companies { get; set; } = new Companies();

        public Head Head { get; set; } = new Head();

        public Banner Banner { get; set; } = new Banner();
    }
}