using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Banner
    {
        public Banner()
        {
            Title = string.Empty;

            NavLinks = new List<NavLink>();
        }

        public string Title { get; set; }

        public IEnumerable<NavLink> NavLinks { get; set; }
    }
}