using Cofoundry.Domain.CQS;
using Newtonsoft.Json;
using System.ComponentModel.DataAnnotations;

namespace Tanyo.Portfolio.Web
{
    public class LogMemberInCommand : ICommand
    {
        [Required]
        [EmailAddress(ErrorMessage = "Please use a valid email address")]
        public string Email { get; set; }

        [Required]
        [DataType(DataType.Password)]
        public string Password { get; set; }
    }
}