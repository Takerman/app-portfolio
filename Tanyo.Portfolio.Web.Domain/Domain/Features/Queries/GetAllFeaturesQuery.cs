using Cofoundry.Domain.CQS;
using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Domain
{
    public class GetAllFeaturesQuery : IQuery<ICollection<Feature>>
    {
    }
}