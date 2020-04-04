using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Models
{
    public class Banner
    {
        public Banner()
        {
            this.Title = string.Empty;
            this.NavLinks = new List<NavLink>();
        }

        public string Title { get; set; }

        public IEnumerable<NavLink> NavLinks { get; set; }
    }
}