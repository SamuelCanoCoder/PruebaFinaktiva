using Microsoft.EntityFrameworkCore;
using EventLoggerAPI.Models;

namespace EventLoggerAPI.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options) { }

        public DbSet<EventLog> EventLogs { get; set; }
    }
}
