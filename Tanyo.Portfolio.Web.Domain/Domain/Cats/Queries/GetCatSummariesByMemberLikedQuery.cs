using Cofoundry.Domain.CQS;
using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Domain
{
    public class GetCatSummariesByMemberLikedQuery : IQuery<ICollection<CatSummary>>
    {
        public GetCatSummariesByMemberLikedQuery()
        {
        }

        public GetCatSummariesByMemberLikedQuery(int id)
        {
            UserId = id;
        }

        public int UserId { get; set; }
    }
}