using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Portfolio
    {
        public IEnumerable<Project> Projects { get; set; } = [];
    }
}