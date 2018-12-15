using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace MetersProject.Models
{
    public class WorkOrderHistory
    {
        public int Id { get; set; }
        [Display(Name = "Work Order ID")]
        public int WorkOrderID { get; set; }
        [Display(Name = "Column Changed")]
        public string ColumnChanged { get; set; }
        [Display(Name = "Old Value")]
        public string OldValue { get; set; }
        [Display(Name = "New Value")]
        public string NewValue { get; set; }
        [Display(Name = "Date Changed")]
        public DateTime Timestamp { get; set; }

        public WorkOrder WorkOrder { get; set; }
    }
}
