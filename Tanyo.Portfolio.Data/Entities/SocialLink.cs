using System.ComponentModel.DataAnnotations;
using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Data.Entities
{
    public class SocialLink
    {
        [Key]
        public int ID { get; set; }

        [JsonPropertyName("url")]
        public string Url { get; set; }

        [JsonPropertyName("icon")]
        public string Icon { get; set; }
    }
}