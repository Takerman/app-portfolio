using System.Collections.Generic;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
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