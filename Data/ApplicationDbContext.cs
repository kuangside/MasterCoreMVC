using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MasterCoreMVC.Models;
using Microsoft.EntityFrameworkCore;

namespace MasterCoreMVC.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options) { }
        
        public DbSet<AppUser> AppUser { get; set; }

        protected override void OnModelCreating(ModelBuilder builder)
        {
            base.OnModelCreating(builder);
            builder.Entity<AppUser>().HasData(new AppUser{
                id=1,
                username="016623",
                password="016623",
                name="Preedee P.",
                roles="Admin",
                isactive=true
            });
        }
    }
}