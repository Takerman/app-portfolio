using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface ICopyLinksService
    {
        IEnumerable<CopyLink> GetLinks();
    }
}