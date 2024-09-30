using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class NavLinksService(DefaultContext context) : INavLinksService
    {
        public IEnumerable<NavLink> GetLinks() => [.. context.NavLinks];
    }
}