using System.Text.Json;
using System.Text.Json.Serialization;

namespace Takerman.Portfolio.Web.Models
{
    public class NavLink
    {
        public object Data;

        [JsonPropertyName("url")]
        public string Url { get; set; }

        [JsonPropertyName("action")]
        public string Action { get; set; }

        [JsonPropertyName("controller")]
        public string Controller { get; set; }

        [JsonPropertyName("label")]
        public string Label { get; set; }

        [JsonPropertyName("icon")]
        public string Icon { get; set; }

        public override string ToString() => JsonSerializer.Serialize(this);
    }
}