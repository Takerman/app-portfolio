using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class BlogService(DefaultContext context) : IBlogService
    {
        public IEnumerable<BlogItemMini> GetBlogItems() => [.. context.BlogItemsMini];

        public IEnumerable<BlogItemMini> GetBlogItemsReversed(int? maxPostsCount = null)
        {
            var result = GetBlogItems().Reverse();

            if (maxPostsCount != null && maxPostsCount.HasValue)
                result = result.Take(maxPostsCount.Value);

            return result.ToList();
        }
    }
}