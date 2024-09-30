using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class SkillsService(DefaultContext context) : ISkillsService
    {
        public IEnumerable<Skill> GetSkills() => [.. context.Skills];
    }
}