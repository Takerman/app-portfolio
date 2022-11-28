using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface ISkillsService
    {
        IEnumerable<Skill> GetSkills();
    }
}