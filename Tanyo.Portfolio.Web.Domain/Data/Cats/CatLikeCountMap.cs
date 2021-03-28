using Cofoundry.Core;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;

namespace Tanyo.Portfolio.Web.Data
{
    public class CatLikeCountMap : IEntityTypeConfiguration<CatLikeCount>
    {
        public void Configure(EntityTypeBuilder<CatLikeCount> builder)
        {
            builder.ToTable("CatLikeCount", DbConstants.DefaultAppSchema);

            builder.HasKey(e => e.CatCustomEntityId);
        }
    }
}