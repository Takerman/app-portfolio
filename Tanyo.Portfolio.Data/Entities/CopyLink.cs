using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class CopyLink
    {
        [Key]
        public int ID { get; set; }

        public string Url { get; set; }

        public string Label { get; set; }
    }
}