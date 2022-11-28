namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class Stats
    {
        public Stats()
        {
            HappyCustomers = 6;

            SolvedTickets = 100;

            AverageRating = 9;
        }

        public int SolvedTickets { get; set; }

        public int AverageRating { get; set; }

        public int HappyCustomers { get; set; }
    }
}