using Cofoundry.Domain;
using Cofoundry.Web;
using Microsoft.AspNetCore.Antiforgery;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;
using Tanyo.Portfolio.Web.Domain;

namespace Tanyo.Portfolio.Web
{
    [Route("api/auth")]
    [AutoValidateAntiforgeryToken]
    public class AuthApiController : ControllerBase
    {
        private readonly IApiResponseHelper _apiResponseHelper;
        private readonly IAntiforgery _antiforgery;
        private readonly IDomainRepository _domainRepository;

        public AuthApiController(
            IApiResponseHelper apiResponseHelper,
            IAntiforgery antiforgery,
            IDomainRepository domainRepository
            )
        {
            _apiResponseHelper = apiResponseHelper;
            _antiforgery = antiforgery;
            _domainRepository = domainRepository;
        }

        /// <summary>
        /// Once we have logged in we need to re-fetch the csrf token because
        /// the user identity will have changed and the old token will be invalid
        /// </summary>
        [HttpGet("session")]
        public async Task<JsonResult> GetAuthSession()
        {
            var member = await _domainRepository.ExecuteQueryAsync(new GetCurrentMemberSummaryQuery());
            var token = _antiforgery.GetAndStoreTokens(HttpContext);

            var sessionInfo = new
            {
                Member = member,
                AntiForgeryToken = token.RequestToken
            };

            return _apiResponseHelper.SimpleQueryResponse(sessionInfo);
        }

        [HttpPost("register")]
        public Task<JsonResult> Register([FromBody] RegisterMemberAndLogInCommand command)
        {
            return _apiResponseHelper.RunCommandAsync(command);
        }

        [HttpPost("login")]
        public Task<JsonResult> Login([FromBody] LogMemberInCommand command)
        {
            return _apiResponseHelper.RunCommandAsync(command);
        }

        [HttpPost("sign-out")]
        public Task<JsonResult> SignOut()
        {
            var command = new LogMemberOutCommand();
            return _apiResponseHelper.RunCommandAsync(command);
        }
    }
}