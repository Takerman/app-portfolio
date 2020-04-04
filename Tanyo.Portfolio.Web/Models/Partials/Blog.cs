using System;
using System.Collections.Generic;
using System.Linq;

namespace Takerman.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        public Blog(int? maxPostsCount = null)
        {
            this.BlogItemsMini = new List<BlogItemMini>();

            this.BlogItemsMini = new List<BlogItemMini>()
                    {
                        //new BlogItemMini(){
                        //    Author = "Tanyo Ivanov",
                        //    Title = "Personal branding and portfolio completed",
                        //    Content = "How and why I choose to change my employment style and to have personal branding. Teams that I joined.",
                        //    Date = new DateTime(2020, 1, 1),
                        //    Image = "/img/profile/b1.jpg",
                        //    Name = "portfiolio-has-been-released" },

                        new BlogItemMini(){
                            Author = "Tanyo Ivanov",
                            Title = "Prices defined and listed",
                            Content = "How I defined and listed my optimized for the client prices.",
                            Date = new DateTime(2020, 1, 17),
                            Image = "/img/blog/home-blog/home-blog-4.jpg",
                            Name = "prices-listed" },

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
                            Name = "designpatterns-package" }
                    };

            this.BlogItemsMini = this.BlogItemsMini.Reverse();

            if (maxPostsCount != null)
            {
                this.BlogItemsMini = this.BlogItemsMini.Take((int)maxPostsCount);
            }
        }

        public string Area { get; }
        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; }
    }
}