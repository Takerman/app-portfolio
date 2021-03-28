using Cofoundry.Domain.CQS;

namespace Tanyo.Portfolio.Web.Domain
{
    public class GetBreedByIdQuery : IQuery<Breed>
    {
        public GetBreedByIdQuery()
        {
        }

        public GetBreedByIdQuery(int id)
        {
            BreedId = id;
        }

        public int BreedId { get; set; }
    }
}