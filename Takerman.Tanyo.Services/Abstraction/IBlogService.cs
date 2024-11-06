using Takerman.Tanyo.Models.DTOs;

namespace Takerman.Tanyo.Services.Abstraction
{
    public interface IBlogService
    {
        List<BlogpostDto> GetBlogposts();
    }
}