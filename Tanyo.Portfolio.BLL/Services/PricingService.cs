using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class PricingService : IPricingService
    {
        public IEnumerable<Price> GetPrices()
        {
            using var context = new MainContext();
            return context.Prices.ToList();
        }
    }
}