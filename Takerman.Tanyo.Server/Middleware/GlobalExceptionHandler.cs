using Microsoft.AspNetCore.Diagnostics;
using Microsoft.AspNetCore.Mvc;

namespace Takerman.Tanyo.Server.Middleware
{
    public sealed class GlobalExceptionHandler(ILogger<GlobalExceptionHandler> _logger) : IExceptionHandler
    {
        public async ValueTask<bool> TryHandleAsync(HttpContext httpContext, Exception exception, CancellationToken cancellationToken)
        {
            var message = exception.Message + (exception.InnerException == null ? string.Empty : exception.InnerException.Message);

            _logger.LogError(exception, $"Exception occurred: {message}");

            var problemDetails = new ProblemDetails
            {
                Status = StatusCodes.Status500InternalServerError,
                Title = "Server error",
                Detail = "An exception occurred. Please send us an email with details to contact@template.net"
            };

            httpContext.Response.StatusCode = problemDetails.Status.Value;

            await httpContext.Response.WriteAsJsonAsync(problemDetails, cancellationToken);

            return true;
        }
    }
}