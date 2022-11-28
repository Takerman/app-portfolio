using System.ComponentModel.DataAnnotations;
using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Price
    {
        [Key]
        public int ID { get; set; }

        public int Value { get; set; }

        public string Currency { get; set; }

        public int Type { get; set; }

        public int Location { get; set; }
    }
}