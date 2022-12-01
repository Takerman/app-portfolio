using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Company
    {
        [Key]
        public int ID { get; set; }

        public string Url { get; set; }

        public string ImageName { get; set; }
    }
}