using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; } = [];
        
        public bool SeeAllVisible { get; set; }
    }
}