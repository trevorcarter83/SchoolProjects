using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using MetersProject.Data;
using MetersProject.Models;
using System.Data.SqlClient;


namespace MetersProject.Controllers
{
    public class WorkOrdersController : Controller
    {
        private readonly WorkOrderContext _context;

        public WorkOrdersController(WorkOrderContext context)
        {
            _context = context;
        }

        // GET: WorkOrders
        public async Task<IActionResult> Index(string sortOrder
                                                , string searchString1
                                                , int? searchString2
                                                , string searchString3
                                                , string searchString4
                                                , string searchString5
                                                , string searchString6
                                                , DateTime? searchString7
                                                , DateTime? searchString8)
        {
            ViewData["IDSort"] = sortOrder == "ID" ? "id-desc" : "ID";
            ViewData["TypeSort"] = sortOrder == "Type" ? "TypeDesc" : "Type";
            ViewData["PropSort"] = sortOrder == "Prop" ? "PropDesc" : "Prop";
            ViewData["SchManSort"] = sortOrder == "SM" ? "SMDesc" : "SM";
            ViewData["TechSort"] = sortOrder == "Tech" ? "TechDesc" : "Tech";
            ViewData["CurrSort"] = sortOrder == "Curr" ? "CurrDesc" : "Curr";
            ViewData["ProposedSort"] = sortOrder == "PDate" ? "PDateDesc" : "PDate";
            ViewData["ScheduledSort"] = sortOrder == "SDate" ? "SDateDesc" : "SDate";
            ViewData["TechFilter"] = searchString1;
            ViewData["WorkOrderIDFilter"] = searchString2;
            ViewData["TypeFilter"] = searchString3;
            ViewData["PropertyFilter"] = searchString4;
            ViewData["SchManFilter"] = searchString5;
            ViewData["CurrentFilter"] = searchString6;
            ViewData["ProposedFilter"] = searchString7;
            ViewData["ScheduledFilter"] = searchString8;
            var workorders = from w in _context.WorkOrders
                             select w;
            if (!String.IsNullOrEmpty(searchString1))
            {
                workorders = workorders.Where(w => w.TechInfo.Contains(searchString1));
            }
            if (!String.IsNullOrEmpty(searchString2.ToString()))
            {
                workorders = workorders.Where(w => w.WorkOrderID.Equals(searchString2));
            }
            if (!String.IsNullOrEmpty(searchString3))
            {
                workorders = workorders.Where(w => w.WorkOrderType.Contains(searchString3));
            }
            if (!String.IsNullOrEmpty(searchString4))
            {
                workorders = workorders.Where(w => w.PropertyInfo.Contains(searchString4));
            }
            if (!String.IsNullOrEmpty(searchString5))
            {
                workorders = workorders.Where(w => w.SchedulingManager.Contains(searchString5));
            }
            if (!String.IsNullOrEmpty(searchString6))
            {
                workorders = workorders.Where(w => w.CurrentStatus.Contains(searchString6));
            }
            if (!String.IsNullOrEmpty(searchString7.ToString()))
            {
                workorders = workorders.Where(w => w.ProposedDate.Equals(searchString7));
            }
            if (!String.IsNullOrEmpty(searchString8.ToString()))
            {
                workorders = workorders.Where(w => w.ScheduledDate.Equals(searchString8));
            }
            switch (sortOrder)
            {
                case "ID":
                    workorders = workorders.OrderBy(w => w.WorkOrderID);
                    break;
                case "id_desc":
                    workorders = workorders.OrderByDescending(w => w.WorkOrderID);
                    break;
                case "Type":
                    workorders = workorders.OrderBy(w => w.WorkOrderType);
                    break;
                case "TypeDesc":
                    workorders = workorders.OrderByDescending(w => w.WorkOrderType);
                    break;
                case "Prop":
                    workorders = workorders.OrderBy(w => w.PropertyInfo);
                    break;
                case "PropDesc":
                    workorders = workorders.OrderByDescending(w => w.PropertyInfo);
                    break;
                case "SM":
                    workorders = workorders.OrderBy(w => w.SchedulingManager);
                    break;
                case "SMDesc":
                    workorders = workorders.OrderByDescending(w => w.SchedulingManager);
                    break;
                case "Tech":
                    workorders = workorders.OrderBy(w => w.TechInfo);
                    break;
                case "TechDesc":
                    workorders = workorders.OrderByDescending(w => w.TechInfo);
                    break;
                case "Curr":
                    workorders = workorders.OrderBy(w => w.CurrentStatus);
                    break;
                case "CurrDesc":
                    workorders = workorders.OrderByDescending(w => w.CurrentStatus);
                    break;
                case "PDate":
                    workorders = workorders.OrderBy(w => w.ProposedDate);
                    break;
                case "PDateDesc":
                    workorders = workorders.OrderByDescending(w => w.ProposedDate);
                    break;
                case "SDate":
                    workorders = workorders.OrderBy(w => w.ScheduledDate);
                    break;
                case "SDateDesc":
                    workorders = workorders.OrderByDescending(w => w.ScheduledDate);
                    break;
                
                default:
                    workorders = workorders.OrderBy(w => w.WorkOrderID);
                    break;
            }
            return View(await workorders.ToListAsync());
        }

        // GET: WorkOrders/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrder = await _context.WorkOrders
                .SingleOrDefaultAsync(m => m.WorkOrderID == id);
            if (workOrder == null)
            {
                return NotFound();
            }

            return View(workOrder);
        }

        // GET: WorkOrders/Create
        public IActionResult Create()
        {
            return View();
        }

        public async Task<IActionResult> History(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrderHistory = await _context.WorkOrderHistories
                .SingleOrDefaultAsync(h => h.WorkOrderID == id);
            if (workOrderHistory == null)
            {
                return NotFound();
            }

            return View("Views/WorkOrderHistories/Index/");
        }

        // POST: WorkOrders/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("WorkOrderID,WorkOrderType,PropertyInfo,SchedulingManager,TechInfo,CurrentStatus,ProposedDate,ScheduledDate")] WorkOrder workOrder)
        {
            if (ModelState.IsValid)
            {
                _context.Add(workOrder);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return View(workOrder);
        }

        // GET: WorkOrders/Edit/5
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrder = await _context.WorkOrders.SingleOrDefaultAsync(m => m.WorkOrderID == id);
            if (workOrder == null)
            {
                return NotFound();
            }
            return View(workOrder);
        }

        // POST: WorkOrders/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, WorkOrder workOrder)   //[Bind("WorkOrderID,WorkOrderType,PropertyInfo,SchedulingManager,TechInfo,CurrentStatus,ProposedDate,ScheduledDate")] 
        {
            string connectionString = "Server=(localdb)\\mssqllocaldb;Database=MetersWorkOrders;Trusted_Connection=True;MultipleActiveResultSets=true";
            if (id != workOrder.WorkOrderID)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    using (SqlConnection con = new SqlConnection(connectionString))
                    {
                        SqlCommand cmd = new SqlCommand("WorkOrderUpdate", con);
                        cmd.CommandType = System.Data.CommandType.StoredProcedure;

                        cmd.Parameters.AddWithValue("@WorkOrderID", workOrder.WorkOrderID);
                        cmd.Parameters.AddWithValue("@CurrentStatus", workOrder.CurrentStatus);
                        cmd.Parameters.AddWithValue("@ProposedDate", workOrder.ProposedDate);
                        cmd.Parameters.AddWithValue("@ScheduledDate", workOrder.ScheduledDate);

                        con.Open();
                        cmd.ExecuteNonQuery();
                        con.Close();
                    }
                    //_context.Update(workOrder);
                    //await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!WorkOrderExists(workOrder.WorkOrderID))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                return RedirectToAction(nameof(Index));
            }
            return View(workOrder);
        }

  

        // GET: WorkOrders/Delete/5
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrder = await _context.WorkOrders
                .SingleOrDefaultAsync(m => m.WorkOrderID == id);
            if (workOrder == null)
            {
                return NotFound();
            }

            return View(workOrder);
        }

        // POST: WorkOrders/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var workOrder = await _context.WorkOrders.SingleOrDefaultAsync(m => m.WorkOrderID == id);
            _context.WorkOrders.Remove(workOrder);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool WorkOrderExists(int id)
        {
            return _context.WorkOrders.Any(e => e.WorkOrderID == id);
        }
    }
}
