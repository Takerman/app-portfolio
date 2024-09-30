using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services
{
    public class StatsService(DefaultContext context) : IStatsService
    {
        public IEnumerable<Stat> GetDevStats() => [.. context.Stats.Where(x => x.Type.ToLower() == "dev")];

        public IEnumerable<Stat> GetCustomerStats() => [.. context.Stats.Where(x => x.Type.ToLower() == "customer")];
    }
}