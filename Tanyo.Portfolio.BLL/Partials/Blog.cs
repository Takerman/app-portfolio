using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        public Blog()
        {
            BlogItemsMini = new List<BlogItemMini>();
        }

        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; }
    }
}