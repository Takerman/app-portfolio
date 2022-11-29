using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.BLL.Services.Interfaces
{
    public interface IStatsService
    {
        public IEnumerable<Stat> GetDevStats();

        public IEnumerable<Stat> GetCustomerStats();
    }
}