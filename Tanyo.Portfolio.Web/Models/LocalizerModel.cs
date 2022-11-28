using System.Collections.Generic;
using System.Globalization;

namespace Tanyo.Portfolio.Web.Models
{
    public class LocalizerModel
    {
        public CultureInfo CurrentUICulture { get; set; }

        public List<CultureInfo> SupportedCultures { get; set; }
    }
}