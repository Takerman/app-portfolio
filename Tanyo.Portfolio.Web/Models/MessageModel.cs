using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Web.Models
{
    public class MessageModel
    {

        [StringLength(300)]
        public string Subject { get; set; }

        [StringLength(600)]
        public string Message { get; set; }

        [Required]
        [EmailAddress]
        public string Email { get; set; }

        [Required]
        [StringLength(300)]
        public string Name { get; set; }
    }
}
