using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class Skill
    {
        [Key]
        public int ID { get; set; }

        public int Value { get; set; }

        public string Name { get; set; }

        public int Years { get; set; }

        public string Category { get; set; }
    }
}