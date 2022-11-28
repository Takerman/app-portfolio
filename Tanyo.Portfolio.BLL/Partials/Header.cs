using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Header
    {
        public Header()
        {
            Classes = string.Empty;

            NavigationLinks = new List<NavLink>();

            ImageUrl = string.Empty;
        }

        public string Classes { get; set; }

        public IEnumerable<NavLink> NavigationLinks { get; set; }

        public string ImageUrl { get; set; }
    }
}