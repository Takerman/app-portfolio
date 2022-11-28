using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class Companies
    {
        public Companies()
        {
            Data = new List<Company>();
        }

        public IEnumerable<Company> Data { get; set; }
    }
}