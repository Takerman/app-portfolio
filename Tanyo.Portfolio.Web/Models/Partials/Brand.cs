using System.Text.Json.Serialization;

namespace Takerman.Portfolio.Web.Models
{
    public class Brand
    {
        public Brand()
        {
            this.Url = string.Empty;
            this.ImageName = string.Empty;
        }

        [JsonPropertyName("url")]
        public string Url { get; set; }

        [JsonPropertyName("imageName")]
        public string ImageName { get; set; }
    }
}