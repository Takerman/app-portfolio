using Cofoundry.Domain;
using Cofoundry.Web;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;
using Tanyo.Portfolio.Web.Domain;

namespace Tanyo.Portfolio.Web
{
    [AuthorizeUserArea(MemberUserArea.MemberUserAreaCode)]
    [Route("api/members/current")]
    public class CurrentMemberApiController : ControllerBase
    {
        private readonly IDomainRepository _domainRepository;
        private readonly IApiResponseHelper _apiResponseHelper;
        private readonly IUserContextService _userContextService;

        public CurrentMemberApiController(
            IDomainRepository domainRepository,
            IApiResponseHelper apiResponseHelper,
            IUserContextService userContextService
            )
        {
            _domainRepository = domainRepository;
            _apiResponseHelper = apiResponseHelper;
            _userContextService = userContextService;
        }

        [HttpGet("cats/liked")]
        public async Task<JsonResult> GetLikedCats()
        {
            // Here we get the userId of the currently logged in member. We could have
            // done this in the query handler, but instead we've chosen to keep the query
            // flexible so it can be re-used in a more generic fashion
            var userContext = await _userContextService.GetCurrentContextAsync();
            var query = new GetCatSummariesByMemberLikedQuery(userContext.UserId.Value);
            var results = await _domainRepository.ExecuteQueryAsync(query);

            return _apiResponseHelper.SimpleQueryResponse(results);
        }
    }
}