namespace Takerman.Portfolio.Web.Models.Partials
{
    public class Stats
    {
        public Stats()
        {
            this.HappyCustomers = 6;
            this.SolvedTickets = 100;
            this.AverageRating = 9;
        }

        public int SolvedTickets { get; set; }
        public int AverageRating { get; set; }
        public int HappyCustomers { get; set; }
    }
}