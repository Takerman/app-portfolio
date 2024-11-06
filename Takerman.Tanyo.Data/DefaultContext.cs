using Microsoft.EntityFrameworkCore;
using System.Reflection;

namespace Takerman.Backup.Data
{
    public class DefaultContext(DbContextOptions options) : DbContext(options)
    {
        protected override void OnModelCreating(ModelBuilder builder)
        {
            base.OnModelCreating(builder);

            builder.ApplyConfigurationsFromAssembly(Assembly.GetExecutingAssembly());
        }
    }
}