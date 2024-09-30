using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class ProjectsService(DefaultContext context) : IProjectsService
    {
        public IEnumerable<Project> GetProjects() => [.. context.Projects];
    }
}