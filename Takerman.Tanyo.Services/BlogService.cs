using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Services
{
    public class BlogService : IBlogService
    {
        public List<BlogpostDto> GetBlogposts()
        {
            return [];
        }
    }
}