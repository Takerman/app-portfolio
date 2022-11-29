using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Stat
    {
        [Key]
        public int ID { get; set; }

        [StringLength(150)]
        public string Name { get; set; }

        public int Value { get; set; }

        public string Type { get; set; }
    }
}