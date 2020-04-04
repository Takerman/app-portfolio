using Microsoft.AspNetCore.Mvc.Filters;
using System;

namespace Takerman.Portfolio.Web.Models.Filters
{
    public class TanyoLayoutActionFilter : Attribute, IActionFilter
    {
        public void OnActionExecuted(ActionExecutedContext context)
        {
        }

        public void OnActionExecuting(ActionExecutingContext context)
        {
            var controller = context.Controller as Areas.Tanyo.Controllers.BaseController;

            if (controller != null)
            {
                controller.ViewData["Layout"] = controller.Layout;
            }
        }
    }
}