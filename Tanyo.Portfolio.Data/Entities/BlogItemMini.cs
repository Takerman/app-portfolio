using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class BlogItemMini
    {
        public BlogItemMini()
        {
            this.Date = DateTime.Now;
        }

        [Key]
        public int ID { get; set; }

        public string Title { get; set; }

        public string Content { get; set; }

        public string Image { get; set; }

        public string Author { get; set; }

        public DateTime Date { get; set; }

        public string Name { get; set; }
    }
}