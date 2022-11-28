using System.Collections.Generic;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models.Partials;

namespace Tanyo.Portfolio.Web.Models
{
    public class IndexModel
    {
        public Stats Stats { get; set; }

        public IEnumerable<BlogItemMini> Blog { get; set; }
    }
}