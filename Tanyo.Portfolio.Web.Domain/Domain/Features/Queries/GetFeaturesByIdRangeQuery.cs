using Cofoundry.Domain.CQS;
using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Domain
{
    public class GetFeaturesByIdRangeQuery : IQuery<IDictionary<int, Feature>>
    {
        public GetFeaturesByIdRangeQuery()
        {
        }

        public GetFeaturesByIdRangeQuery(ICollection<int> ids)
        {
            FeatureIds = ids;
        }

        public ICollection<int> FeatureIds { get; set; }
    }
}