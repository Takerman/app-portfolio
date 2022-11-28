using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        public Blog(int? maxPostsCount = null)
        {
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

                        new BlogItemMini(){
                            Author = "Tanyo Ivanov",
                            Title = "Raspberry Pi Home Automation",
                            Content = @"In this blog post I will show you how I'm using some Raspberry PIs
                                        for web server, media center, smar home, database server, to save pictures
                                        from a camera and more.",
                            Date = new DateTime(2020, 3, 7),
                            Image = "/img/blog/raspberry-pi-home-automation/raspberry-pi-cover.png",
                            Name = "raspberrypi-home-automation" },

                        new BlogItemMini(){
                            Author = "Tanyo Ivanov",
                            Title = "Design Patterns Package",
                            Content = @"Here you can find a package with Design Patterns which I made while watching a YouTube channel. There is explanation and a video about all of them.",
                            Date = new DateTime(2020, 3, 22),
                            Image = "/img/blog/designpatterns.png",
                            Name = "designpatterns-package" },

                        new BlogItemMini(){
                            Author = "Tanyo Ivanov",
                            Title = "aws-summit-title-mini",
                            Content = @"aws-summit-content-mini",
                            Date = new DateTime(2022, 11, 26),
                            Image = "/img/blog/aws-summit.png",
                            Name = "aws-summit-2022" }
                    };

            BlogItemsMini = BlogItemsMini.Reverse();

            if (maxPostsCount != null)
            {
                BlogItemsMini = BlogItemsMini.Take((int)maxPostsCount);
            }
        }

        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; }
    }
}