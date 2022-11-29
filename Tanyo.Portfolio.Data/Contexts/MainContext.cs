using Microsoft.EntityFrameworkCore;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Data.Contexts
{
    public class MainContext : DbContext
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

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlite("Data Source=" + Path.Combine(Environment.CurrentDirectory, "tanyo_data.db3;"));
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<BlogItemMini>().ToTable("BlogItemsMini");
            modelBuilder.Entity<NavLink>().ToTable("NavLinks");
            modelBuilder.Entity<CopyLink>().ToTable("CopyLinks");
            modelBuilder.Entity<SocialLink>().ToTable("SocialLinks");
            modelBuilder.Entity<Price>().ToTable("Prices");
            modelBuilder.Entity<Project>().ToTable("Projects");
            modelBuilder.Entity<Skill>().ToTable("Skills");
            modelBuilder.Entity<Company>().ToTable("Companies");
            modelBuilder.Entity<Stat>().ToTable("Stats");
        }
    }
}