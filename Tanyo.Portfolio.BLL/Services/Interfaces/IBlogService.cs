using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface IBlogService
    {
        IEnumerable<BlogItemMini> GetBlogItems();

        IEnumerable<BlogItemMini> GetBlogItemsReversed(int? maxPostsCount = null);
    }
}