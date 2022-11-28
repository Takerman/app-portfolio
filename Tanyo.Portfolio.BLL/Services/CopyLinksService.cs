using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class CopyLinksService : ICopyLinksService
    {
        public IEnumerable<CopyLink> GetLinks()
        {
            using var context = new MainContext();
            return context.CopyLinks.ToList();
        }
    }
}