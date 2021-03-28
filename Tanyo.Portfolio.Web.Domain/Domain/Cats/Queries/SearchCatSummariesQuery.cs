using Cofoundry.Domain;
using Cofoundry.Domain.CQS;

namespace Tanyo.Portfolio.Web.Domain
{
    public class SearchCatSummariesQuery
        : SimplePageableQuery
        , IQuery<PagedQueryResult<CatSummary>>
    {
    }
}