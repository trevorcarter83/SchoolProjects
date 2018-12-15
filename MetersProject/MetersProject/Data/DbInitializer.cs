using MetersProject.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MetersProject.Data
{
    public static class DbInitializer
    {
        public static void Initialize(WorkOrderContext context)
        {
            context.Database.EnsureCreated();

            if (context.WorkOrders.Any())
            {
                return;
            }

            var workorders = new WorkOrder[]
            {
                new WorkOrder{
                        WorkOrderID =1
                        ,WorkOrderType="Install"
                        ,PropertyInfo="Trevors House"
                        ,SchedulingManager="Trevor Carter"
                        ,TechInfo="Mickey Mouse"
                        ,CurrentStatus="Complete"
                        ,ProposedDate=DateTime.Parse("2010-10-02")
                        ,ScheduledDate=DateTime.Parse("2013-01-04")},
                new WorkOrder{
                        WorkOrderID =2
                        ,WorkOrderType="Review"
                        ,PropertyInfo="Conservice"
                        ,SchedulingManager="Tom Brady"
                        ,TechInfo="Josh Groban"
                        ,CurrentStatus="Eternal Work Order"
                        ,ProposedDate=DateTime.Parse("1960-10-07")
                        ,ScheduledDate=DateTime.Parse("2017-01-05")},
                new WorkOrder{
                        WorkOrderID =3
                        ,WorkOrderType="New System"
                        ,PropertyInfo="White House"
                        ,SchedulingManager="George Washington"
                        ,TechInfo="Donald Trump"
                        ,CurrentStatus="Patriotic"
                        ,ProposedDate=DateTime.Parse("1776-07-04")
                        ,ScheduledDate=DateTime.Parse("2018-08-24")}
            };

            foreach (WorkOrder w in workorders)
            {
                context.WorkOrders.Add(w);
            }

            context.SaveChanges();


        }
    }
}
