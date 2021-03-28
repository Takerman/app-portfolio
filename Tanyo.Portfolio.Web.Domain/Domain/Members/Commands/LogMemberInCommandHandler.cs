using Cofoundry.Domain;
using Cofoundry.Domain.CQS;
using System.Threading.Tasks;
using Tanyo.Portfolio.Web.Domain;

namespace Tanyo.Portfolio.Web
{
    /// <summary>
    /// Cofoundry has a number of apis to help you validate
    /// and log users in, but here were going to simply wrap
    /// the Cofoundry LogUserInWithCredentialsCommand which handles
    /// validation, authentication and additional security checks
    /// such as preventing excessive login attempts.
    /// </summary>
    public class LogMemberInCommandHandler
        : ICommandHandler<LogMemberInCommand>
        , IIgnorePermissionCheckHandler
    {
        private readonly ICommandExecutor _commandExecutor;

        public LogMemberInCommandHandler(
            ICommandExecutor commandExecutor
            )
        {
            _commandExecutor = commandExecutor;
        }

        public Task ExecuteAsync(LogMemberInCommand command, IExecutionContext executionContext)
        {
            var logUserInCommand = new LogUserInWithCredentialsCommand()
            {
                Username = command.Email,
                Password = command.Password,
                UserAreaCode = MemberUserArea.MemberUserAreaCode,
                RememberUser = true
            };

            return _commandExecutor.ExecuteAsync(logUserInCommand);
        }
    }
}