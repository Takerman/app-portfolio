using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class StatsService : IStatsService
    {
        public IEnumerable<Stat> GetDevStats()
        {
            using var context = new MainContext();
            return context.Stats.Where(x => x.Type.ToLower() == "dev").ToList();
        }

        public IEnumerable<Stat> GetCustomerStats()
        {
            using var context = new MainContext();
            return context.Stats.Where(x => x.Type.ToLower() == "customer").ToList();
        }
    }
}