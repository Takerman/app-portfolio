using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class CopyLinksService(DefaultContext context) : ICopyLinksService
    {
        public IEnumerable<CopyLink> GetLinks() => [.. context.CopyLinks];
    }
}