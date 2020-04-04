using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Models
{
    public class Footer
    {
        public Footer()
        {
            this.NavigationLinks = new List<NavLink>();
            this.SocialLinks = new List<NavLink>();
            this.CopyLink = new NavLink();
        }

        public string ImageUrl { get; set; }
        public IEnumerable<NavLink> NavigationLinks { get; set; }
        public IEnumerable<NavLink> SocialLinks { get; set; }
        public NavLink CopyLink { get; set; }
    }
}