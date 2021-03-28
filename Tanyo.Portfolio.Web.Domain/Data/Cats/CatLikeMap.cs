using Cofoundry.Core;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;

namespace Tanyo.Portfolio.Web.Data
{
    public class CatLikeMap : IEntityTypeConfiguration<CatLike>
    {
        public void Configure(EntityTypeBuilder<CatLike> builder)
        {
            builder.ToTable("CatLike", DbConstants.DefaultAppSchema);

            builder.HasKey(e => new { e.CatCustomEntityId, e.UserId });

            // Relationships
            builder.HasOne(s => s.CatCustomEntity)
                .WithMany()
                .HasForeignKey(d => d.CatCustomEntityId);

            builder.HasOne(s => s.User)
                .WithMany()
                .HasForeignKey(d => d.UserId);
        }
    }
}