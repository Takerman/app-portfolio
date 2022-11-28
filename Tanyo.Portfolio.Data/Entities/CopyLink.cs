using System.ComponentModel.DataAnnotations;
using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Data.Entities
{
    public class CopyLink
    {
        [Key]
        public int ID { get; set; }

        [JsonPropertyName("url")]
        public string Url { get; set; }

        [JsonPropertyName("label")]
        public string Label { get; set; }
    }
}