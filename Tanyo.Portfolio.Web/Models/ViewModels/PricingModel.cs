using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class PricingModel
    {
        public PricingModel()
        {
            if (Skills == null)
            {
                Skills = new List<Skill>();
            }

            if (Prices == null)
            {
                Prices = new List<Price>();
            }
        }

        public IEnumerable<Skill> Skills { get; set; }
        public IEnumerable<Price> Prices { get; set; }
    }
}