using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class ProjectsService : IProjectsService
    {
        public IEnumerable<Project> GetProjects()
        {
            using var context = new MainContext();
            return context.Projects.ToList();
        }
    }
}