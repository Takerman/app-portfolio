using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Portfolio
    {
        public Portfolio()
        {
            this.Projects = new List<Project>();

            this.Projects = new List<Project>()
                    {
                        new Project(){ SizeMd = 6, SizeLg = 6, Type = "Other", Client = "List with various short term projects", Location = "", Name = "Various", Title = "Various short term projects", Image = "/img/portfolio/p1.png" },
                        //new Project(){ SizeMd = 6, SizeLg = 6, Type = "Web", Client = "Foster + Partners", Location = "London, United Kingdom", Name = "Intranet", Title = "Intranet", Image = "/img/portfolio/p4.png" },
                        //new Project(){ SizeMd = 6, SizeLg = 3, Type = "Desktop",Client = "BuCons", Location = "Zurich, Switzerland", Name = "HSO", Title = "HSO Business School", Image = "/img/portfolio/p2.png" },
                        //new Project(){ SizeMd = 6, SizeLg = 3, Type = "Web", Client = "BGO Software", Location = "United Kingdom", Name = "HARP", Title = "HARP - contribution", Image = "/img/portfolio/p3.png" },
                        //new Project(){ SizeMd = 6, SizeLg = 6, Type = "Web", Client = "Comstream", Location = "Gothernburg, Sweden", Name = "Egain", Title = "Receiver installer", Image = "/img/portfolio/p5.png" },
                        new Project(){ SizeMd = 6, SizeLg = 6, Type = "Other", Client = "Me", Location = "Home", Name = "Hobby", Title = "As Hobby", Image = "/img/portfolio/p6.png" }
                    };
        }

        public IEnumerable<Project> Projects { get; set; }
    }
}