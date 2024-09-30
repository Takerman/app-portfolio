using Microsoft.EntityFrameworkCore;
using System.Reflection;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Data.Contexts
{
    public class DefaultContext(DbContextOptions options) : DbContext(options)
    {
        public DbSet<BlogItemMini> BlogItemsMini { get; set; }

        public DbSet<NavLink> NavLinks { get; set; }

        public DbSet<CopyLink> CopyLinks { get; set; }

        public DbSet<SocialLink> SocialLinks { get; set; }

        public DbSet<Price> Prices { get; set; }

        public DbSet<Project> Projects { get; set; }

        public DbSet<Skill> Skills { get; set; }

        public DbSet<Company> Companies { get; set; }

        public DbSet<Stat> Stats { get; set; }

        protected override void OnModelCreating(ModelBuilder builder)
        {
            base.OnModelCreating(builder);

            builder.ApplyConfigurationsFromAssembly(Assembly.GetExecutingAssembly());
            builder.Entity<BlogItemMini>().ToTable("BlogItemsMini");
            builder.Entity<NavLink>().ToTable("NavLinks");
            builder.Entity<CopyLink>().ToTable("CopyLinks");
            builder.Entity<SocialLink>().ToTable("SocialLinks");
            builder.Entity<Price>().ToTable("Prices");
            builder.Entity<Project>().ToTable("Projects");
            builder.Entity<Skill>().ToTable("Skills");
            builder.Entity<Company>().ToTable("Companies");
            builder.Entity<Stat>().ToTable("Stats");
        }
    }
}