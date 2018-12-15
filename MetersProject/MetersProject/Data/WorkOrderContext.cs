using MetersProject.Models;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MetersProject.Data
{
   
    public class WorkOrderContext : DbContext
    {
        public WorkOrderContext(DbContextOptions<WorkOrderContext> options) : base(options)
        {

        }

        public DbSet<WorkOrder> WorkOrders { get; set; }
        public DbSet<WorkOrderHistory> WorkOrderHistories { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<WorkOrder>().ToTable("WorkOrder");
            modelBuilder.Entity<WorkOrderHistory>().ToTable("WorkOrderHistory");
        }
    }
}
