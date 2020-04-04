using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Models
{
    public class Header
    {
        public Header()
        {
            this.Classes = string.Empty;
            this.NavigationLinks = new List<NavLink>();
            this.ImageUrl = string.Empty;
        }

        public string Classes { get; set; }

        public IEnumerable<NavLink> NavigationLinks { get; set; }

        public string ImageUrl { get; set; }
    }
}