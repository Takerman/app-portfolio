using Microsoft.AspNetCore.Mvc;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class HomeController(ILogger<HomeController> _logger) : ControllerBase
    {
    }
}