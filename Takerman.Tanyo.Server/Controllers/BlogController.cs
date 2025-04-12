using Microsoft.AspNetCore.Mvc;
using Takerman.Services.Publishing;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class BlogController(IBlogService _blogService, PostsClient _postsClient) : ControllerBase
    {
        [HttpGet("GetBlogposts")]
        public async Task<IEnumerable<PostDto>> GetBlogposts()
        {
            var result = await _postsClient.GetByProject("tanyoProfessional");
            return result;
        }

        [HttpGet("GetBlogpost")]
        public async Task<PostDto> GetBlogpost(int id)
        {
            var result = await _postsClient.GetAsync(id);
            return result;
        }
    }
}