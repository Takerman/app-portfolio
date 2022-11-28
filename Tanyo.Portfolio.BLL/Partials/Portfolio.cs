using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Portfolio
    {
        public Portfolio()
        {
            Projects = new List<Project>();
        }

        public IEnumerable<Project> Projects { get; set; }
    }
}