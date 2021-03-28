using Cofoundry.Domain;
using Cofoundry.Domain.CQS;
using System.Threading.Tasks;

namespace Tanyo.Portfolio.Web.Domain
{
    /// <summary>
    /// A simple command handler to wrap member logout logic. Although it's
    /// only a one-liner, we've created a handler just to keep it consistent
    /// with the reset of the domain logic.
    /// </summary>
    public class LogMemberOutCommandHandler
        : ICommandHandler<LogMemberOutCommand>
        , IIgnorePermissionCheckHandler
    {
        private readonly ILoginService _loginService;

        public LogMemberOutCommandHandler(
            ILoginService loginService
            )
        {
            _loginService = loginService;
        }

        public Task ExecuteAsync(LogMemberOutCommand command, IExecutionContext executionContext)
        {
            return _loginService.SignOutAsync(MemberUserArea.MemberUserAreaCode);
        }
    }
}