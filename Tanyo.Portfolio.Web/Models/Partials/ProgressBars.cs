using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class ProgressBars
    {
        public ProgressBars()
        {
            this.Bars = new Dictionary<string, int>();
            this.Bars.Add("Front-End", 7);
            this.Bars.Add("Back-End", 9);
            this.Bars.Add("Databases", 7);
            this.Bars.Add("Web", 8);
            this.Bars.Add("Desktop", 7);
        }

        public Dictionary<string, int> Bars { get; set; }
    }
}