using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Data.Entities
{
    public class NavLink
    {
        [Key]
        public int ID { get; set; }

        public object Data;
        public string Action { get; set; }

        public string Controller { get; set; }

        public string Label { get; set; }
    }
}