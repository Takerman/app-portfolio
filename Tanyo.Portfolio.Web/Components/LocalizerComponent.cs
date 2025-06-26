using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Localization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Options;
using System.Linq;
using Tanyo.Portfolio.Web.Models;

namespace Tanyo.Portfolio.Web.Components
{
    public class LocalizerComponent(IOptions<RequestLocalizationOptions> _localizationOptions) : ViewComponent
    {
        public IViewComponentResult Invoke()
        {
            var cultureFeature = HttpContext.Features.Get<IRequestCultureFeature>();
            var model = new LocalizerModel
            {
                SupportedCultures = _localizationOptions.Value.SupportedUICultures.ToList(),
                CurrentUICulture = cultureFeature.RequestCulture.UICulture
            };
            return View(model);
        }
    }
}