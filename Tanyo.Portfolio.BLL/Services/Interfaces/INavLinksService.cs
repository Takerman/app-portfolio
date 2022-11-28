using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface INavLinksService
    {
        IEnumerable<Company> GetCompanies();

        IEnumerable<NavLink> GetCopyLinks();

        IEnumerable<NavLink> GetNavLinks();

        IEnumerable<NavLink> GetSocialLinks();
    }
}