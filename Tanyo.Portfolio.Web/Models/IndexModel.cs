using System.Collections.Generic;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Models
{
    public class IndexModel
    {
        public IEnumerable<Stat> DevStats { get; set; }

        public IEnumerable<Stat> CustomerStats { get; set; }

        public Blog Blog { get; set; }
    }
}