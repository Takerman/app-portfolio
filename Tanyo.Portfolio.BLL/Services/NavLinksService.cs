using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class NavLinksService : INavLinksService
    {
        public IEnumerable<NavLink> GetNavLinks()
        {
            using var context = new MainContext();
            return context.NavLinks.ToList();
        }

        public IEnumerable<NavLink> GetSocialLinks()
        {
            using var context = new MainContext();
            return context.NavLinks.ToList();
        }

        public IEnumerable<NavLink> GetCopyLinks()
        {
            using var context = new MainContext();
            return context.NavLinks.ToList();
        }

        public IEnumerable<Company> GetCompanies()
        {
            using var context = new MainContext();
            return context.Companies.ToList();
        }
    }
}