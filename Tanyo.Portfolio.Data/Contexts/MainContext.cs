using Microsoft.EntityFrameworkCore;
using Tanyo.Portfolio.Data.Entities;

namespace Tanyo.Portfolio.Data.Contexts
{
    public class MainContext : DbContext
    {
        public DbSet<BlogItemMini> BlogItemsMini { get; set; }

        public DbSet<NavLink> NavLinks { get; set; }

        public DbSet<Price> Prices { get; set; }

        public DbSet<Project> Projects { get; set; }

        public DbSet<Skill> Skills { get; set; }

        public DbSet<Company> Companies { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlite("Data Source=tanyo_data.db;");
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<BlogItemMini>().ToTable("BlogItemsMini");
            modelBuilder.Entity<NavLink>().ToTable("NavLinks");
            modelBuilder.Entity<Price>().ToTable("Prices");
            modelBuilder.Entity<Project>().ToTable("Projects");
            modelBuilder.Entity<Skill>().ToTable("Skills");
            modelBuilder.Entity<Company>().ToTable("Companies");
        }
    }
}