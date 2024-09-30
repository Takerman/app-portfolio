using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Services
{
    public class PricingService(DefaultContext context) : IPricingService
    {
        public IEnumerable<Price> GetPrices() => [.. context.Prices];
    }
}