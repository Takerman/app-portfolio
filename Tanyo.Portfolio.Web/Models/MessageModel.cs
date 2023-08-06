using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Web.Models
{
    public class MessageModel
    {
        [StringLength(250)]
        [DataType(DataType.Text)]
        public string Subject { get; set; }

        [Required]
        [StringLength(800)]
        [DataType(DataType.MultilineText)]
        public string Message { get; set; }

        [Required]
        [EmailAddress]
        [StringLength(200)]
        [DataType(DataType.EmailAddress)]
        public string Email { get; set; }

        [Required]
        [StringLength(300)]
        [DataType(DataType.Text)]
        public string Name { get; set; }
    }
}