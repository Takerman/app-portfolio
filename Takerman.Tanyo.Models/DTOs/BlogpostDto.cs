namespace Takerman.Tanyo.Models.DTOs
{
    public class BlogpostDto
    {
        public string Content { get; set; } = string.Empty;
        public string Date { get; set; } = string.Empty;
        public int ID { get; set; }
        public string Image { get; set; } = string.Empty;
        public string Name { get; set; } = string.Empty;
        public string Title { get; set; } = string.Empty;
    }
}