using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Portfolio
    {
        public Portfolio()
        {
            this.Projects = new List<Project>();
        }

        public IEnumerable<Project> Projects { get; set; }
    }
}