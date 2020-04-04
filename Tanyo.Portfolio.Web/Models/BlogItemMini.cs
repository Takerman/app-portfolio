using System;

namespace Takerman.Portfolio.Web.Models
{
    public class BlogItemMini
    {
        public BlogItemMini() : base()
        {
            this.Date = DateTime.Now;
        }

        public string Title { get; set; }
        public string Content { get; set; }
        public string Image { get; set; }
        public string Author { get; set; }
        public DateTime Date { get; set; }
        public string Name { get; set; }
    }
}