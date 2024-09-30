using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class CompaniesService(DefaultContext context) : ICompaniesService
    {
        public IEnumerable<Company> GetCompanies() => [.. context.Companies];
    }
}