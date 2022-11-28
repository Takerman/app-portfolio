using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface ISocialLinksService
    {
        public IEnumerable<SocialLink> GetLinks();
    }
}