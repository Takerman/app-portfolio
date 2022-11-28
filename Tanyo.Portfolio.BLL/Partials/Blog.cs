using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        private IBlogService _blogService;

        public Blog(IBlogService blogService)
        {
            _blogService = blogService;
        }

        public Blog(int? maxPostsCount = null)
        {
            /*
            BlogItemsMini = new List<BlogItemMini>()
                    {
                        //new BlogItemMini(){
                        //    Author = "Tanyo Ivanov",
                        //    Title = "Personal branding and portfolio completed",
                        //    Content = "How and why I choose to change my employment style and to have personal branding. Teams that I joined.",
                        //    Date = new DateTime(2020, 1, 1),
                        //    Image = "/img/profile/b1.jpg",
                        //    Name = "portfiolio-has-been-released" },

                        //new BlogItemMini(){
                        //    Author = "Tanyo Ivanov",
                        //    Title = "Prices defined and listed",
                        //    Content = "How I defined and listed my optimized for the client prices.",
                        //    Date = new DateTime(2020, 1, 17),
                        //    Image = "/img/blog/home-blog/home-blog-4.jpg",
                        //    Name = "prices-listed" },
                    };
            */

            BlogItemsMini = _blogService.GetBlogItemsReversed(maxPostsCount.HasValue ? maxPostsCount.Value : 0);

        }

        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; }
    }
}