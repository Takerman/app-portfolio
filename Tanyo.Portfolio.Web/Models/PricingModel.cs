using System.Collections.Generic;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Web.Models
{
    public class PricingModel
    {
        public IEnumerable<Skill> Skills { get; set; } = [];

        public IEnumerable<Price> Prices { get; set; } = [];
    }
}