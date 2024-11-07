using Microsoft.AspNetCore.Mvc;
using Takerman.Mail;
using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class HomeController(IHomeService _homeService) : ControllerBase
    {
        [HttpPost("SendMessage")] 
        public async Task SendMessage(MailMessageDto message)
        {
            await _homeService.SendMessageAsync(message);
        }
    }
}