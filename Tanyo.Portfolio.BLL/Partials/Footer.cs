using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Footer
    {
        public string ImageUrl { get; set; }

        public IEnumerable<NavLink> NavigationLinks { get; set; } = [];

        public IEnumerable<SocialLink> SocialLinks { get; set; } = [];

        public CopyLink CopyLink { get; set; } = new CopyLink();
    }
}