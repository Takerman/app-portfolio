using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class SocialLinksService(DefaultContext context) : ISocialLinksService
    {
        public IEnumerable<SocialLink> GetLinks() => [.. context.SocialLinks];
    }
}