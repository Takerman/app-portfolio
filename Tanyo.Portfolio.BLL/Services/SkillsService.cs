using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class SkillsService : ISkillsService
    {
        public IEnumerable<Skill> GetSkills()
        {
            using var context = new MainContext();
            return context.Skills.ToList();
        }
    }
}