using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Footer
    {
        public Footer()
        {
            NavigationLinks = new List<NavLink>();

            SocialLinks = new List<NavLink>();

            CopyLink = new NavLink();
        }

        public string ImageUrl { get; set; }

        public IEnumerable<NavLink> NavigationLinks { get; set; }

        public IEnumerable<NavLink> SocialLinks { get; set; }

        public NavLink CopyLink { get; set; }
    }
}