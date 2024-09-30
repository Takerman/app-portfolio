using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Header
    {
        public string Classes { get; set; } = string.Empty;

        public IEnumerable<NavLink> NavigationLinks { get; set; } = [];

        public string ImageUrl { get; set; } = string.Empty;
    }
}