using System.Text.Json.Serialization;

namespace Tanyo.Portfolio.Web.Models
{
    public class Price
    {
        [JsonPropertyName("value")]
        public int Value { get; set; }

        [JsonPropertyName("currency")]
        public string Currency { get; set; }

        [JsonPropertyName("type")]
        public int Type { get; set; }

        [JsonPropertyName("location")]
        public int Location { get; set; }
    }
}