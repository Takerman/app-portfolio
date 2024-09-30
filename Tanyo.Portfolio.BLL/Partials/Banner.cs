using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Banner
    {
        public string Title { get; set; } = string.Empty;

        public IEnumerable<NavLink> NavLinks { get; set; } = [];
    }
}