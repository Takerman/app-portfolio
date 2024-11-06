using Microsoft.AspNetCore.Diagnostics;
using Microsoft.AspNetCore.Mvc;

namespace Takerman.Tanyo.Server.Middleware
{
    public sealed class BadRequestExceptionHandler(ILogger<BadRequestExceptionHandler> _logger) : IExceptionHandler
    {
        public async ValueTask<bool> TryHandleAsync(HttpContext httpContext, Exception exception, CancellationToken cancellationToken)
        {
            if (exception is not BadHttpRequestException badRequestException)
            {
                return false;
            }

            var message = exception.Message + (exception.InnerException == null ? string.Empty : exception.InnerException.Message);

            _logger.LogError(badRequestException, $"Exception occurred: {message}");

            var problemDetails = new ProblemDetails
            {
                Status = StatusCodes.Status400BadRequest,
                Title = "Bad Request",
                Detail = badRequestException.Message
            };

            httpContext.Response.StatusCode = problemDetails.Status.Value;

            await httpContext.Response.WriteAsJsonAsync(problemDetails, cancellationToken);

            return true;
        }
    }
}