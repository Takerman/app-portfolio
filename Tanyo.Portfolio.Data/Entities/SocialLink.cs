using System.ComponentModel.DataAnnotations;
using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Data.Entities
{
    public class SocialLink
    {
        [Key]
        public int ID { get; set; }

        public string Url { get; set; }

        public string Icon { get; set; }
    }
}