using Sieve.Attributes;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace MetersProject.Models
{
    public class WorkOrder
    {
        [Display(Name = "Work Order ID")]
        public int WorkOrderID { get; set; }
        [Display(Name = "Work Order Type")]
        public string WorkOrderType { get; set; }
        [Display(Name = "Property Info")]
        public string PropertyInfo { get; set; }
        [Display(Name = "Scheduling Manager")]
        public string SchedulingManager { get; set; }
        [Display(Name = "Tech Info")]
        public string TechInfo { get; set; }
        [Display(Name = "Current Status")]
        public string CurrentStatus { get; set; }
        [Display(Name = "Proposed Date")]
        [DisplayFormat(DataFormatString = "{0:d}")]
        [DataType(DataType.Date)]
        public DateTime ProposedDate { get; set; }
        [Display(Name = "Scheduled Date")]
        [DisplayFormat(DataFormatString = "{0:d}")]
        [DataType(DataType.Date)]
        public DateTime ScheduledDate { get; set; }

        public ICollection<WorkOrderHistory> WorkOrderHistories { get; set; }
    }

   
}
