namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class ProgressBars
    {
        public ProgressBars()
        {
            Bars = new Dictionary<string, int>
            {
                { "Front-End", 7 },
                { "Back-End", 9 },
                { "Databases", 7 },
                { "Web", 8 },
                { "Desktop", 7 }
            };
        }

        public Dictionary<string, int> Bars { get; set; }
    }
}