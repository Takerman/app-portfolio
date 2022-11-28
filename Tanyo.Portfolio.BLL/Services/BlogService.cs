using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class BlogService : IBlogService
    {
        public IEnumerable<BlogItemMini> GetBlogItems()
        {
            using var context = new MainContext();
            return context.BlogItemsMini.ToList();
        }

        public IEnumerable<BlogItemMini> GetBlogItemsReversed(int maxPostsCount)
        {
            return GetBlogItems().Reverse().Take(maxPostsCount).ToList();
        }
    }
}