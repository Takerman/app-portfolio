using Cofoundry.Domain.CQS;

namespace Tanyo.Portfolio.Web.Domain
{
    public class GetCatDetailsByIdQuery : IQuery<CatDetails>
    {
        public GetCatDetailsByIdQuery()
        {
        }

        public GetCatDetailsByIdQuery(int id)
        {
            CatId = id;
        }

        public int CatId { get; set; }
    }
}