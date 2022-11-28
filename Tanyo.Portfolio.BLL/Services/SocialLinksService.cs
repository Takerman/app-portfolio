using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class SocialLinksService : ISocialLinksService
    {
        public IEnumerable<SocialLink> GetLinks()
        {
            using var context = new MainContext();
            return context.SocialLinks.ToList();
        }
    }
}