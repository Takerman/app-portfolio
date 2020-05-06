using System.Collections.Generic;
using System.Globalization;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class LocalizerModel
    {
        public CultureInfo CurrentUICulture { get; set; }
        public List<CultureInfo> SupportedCultures { get; set; }
    }
}