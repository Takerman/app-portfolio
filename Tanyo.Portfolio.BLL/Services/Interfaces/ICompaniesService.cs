using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface ICompaniesService
    {
        IEnumerable<Company> GetCompanies();
    }
}