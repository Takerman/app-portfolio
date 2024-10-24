

namespace Takerman.Tanyo.Models.DTOs
{
    public class BackupDto
    {
        public string Name { get; set; }

        public string Location { get; set; }
        
        public decimal Size { get; set; }
        
        public DateTime Created { get; set; }
    }
}