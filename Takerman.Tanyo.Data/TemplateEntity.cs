using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace Takerman.Backup.Data
{
    public class TemplateEntity
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }

        [DataType(DataType.Text)]
        public string Content { get; set; }
    }
}