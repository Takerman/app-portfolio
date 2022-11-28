using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface IProjectsService
    {
        IEnumerable<Project> GetAll();
    }
}