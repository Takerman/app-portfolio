using Cofoundry.Domain;
using Cofoundry.Web;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;
using Tanyo.Portfolio.Web.Domain;

namespace Tanyo.Portfolio.Web
{
    [Route("api/features")]
    public class FeaturesApiController : ControllerBase
    {
        private readonly IDomainRepository _domainRepository;
        private readonly IApiResponseHelper _apiResponseHelper;

        public FeaturesApiController(
            IDomainRepository domainRepository,
            IApiResponseHelper apiResponseHelper
            )
        {
            _domainRepository = domainRepository;
            _domainRepository = domainRepository;
            _apiResponseHelper = apiResponseHelper;
        }

        [HttpGet("")]
        public async Task<JsonResult> Get()
        {
            var query = new GetAllFeaturesQuery();
            var results = await _domainRepository.ExecuteQueryAsync(query);

            return _apiResponseHelper.SimpleQueryResponse(results);
        }
    }
}