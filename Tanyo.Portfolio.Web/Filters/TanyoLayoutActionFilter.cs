using Microsoft.AspNetCore.Mvc.Filters;
using System;
using Tanyo.Portfolio.Web.Areas.Tanyo.Controllers;

namespace Tanyo.Portfolio.Web.Models.Filters
{
    public class TanyoLayoutActionFilter : Attribute, IActionFilter
    {
        public void OnActionExecuted(ActionExecutedContext context)
        {
        }

        public void OnActionExecuting(ActionExecutingContext context)
        {
            var controller = context.Controller as BaseController;

            if (controller != null)
            {
                controller.ViewData["Layout"] = controller.Layout;
            }
        }
    }
}