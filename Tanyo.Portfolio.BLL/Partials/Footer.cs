using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Footer
    {
        public Footer()
        {
            NavigationLinks = new List<NavLink>();

            SocialLinks = new List<SocialLink>();

            CopyLink = new CopyLink();
        }

        public string ImageUrl { get; set; }

        public IEnumerable<NavLink> NavigationLinks { get; set; }

        public IEnumerable<SocialLink> SocialLinks { get; set; }

        public CopyLink CopyLink { get; set; }
    }
}