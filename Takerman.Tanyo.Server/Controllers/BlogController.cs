using Microsoft.AspNetCore.Mvc;
using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class BlogController(IBlogService _blogService) : ControllerBase
    {
        [HttpGet("GetBlogposts")]
        public List<BlogpostDto> GetBlogposts()
        {
            return _blogService.GetBlogposts();
        }
    }
}