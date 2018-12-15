using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using MetersProject.Data;
using MetersProject.Models;

namespace MetersProject.Controllers
{
    public class WorkOrderHistoriesController : Controller
    {
        private readonly WorkOrderContext _context;

        public WorkOrderHistoriesController(WorkOrderContext context)
        {
            _context = context;
        }

        // GET: WorkOrderHistories
        public async Task<IActionResult> Index(int id)
        {
            var workOrderContext = _context.WorkOrderHistories
                .Include(w => w.WorkOrder)
                .Where(w => w.WorkOrderID == id);
            return View(await workOrderContext.ToListAsync());
        }

        // GET: WorkOrderHistories/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrderHistory = await _context.WorkOrderHistories
                .Include(w => w.WorkOrder)
                .SingleOrDefaultAsync(m => m.Id == id);
            if (workOrderHistory == null)
            {
                return NotFound();
            }

            return View(workOrderHistory);
        }

        // GET: WorkOrderHistories/Create
        public IActionResult Create()
        {
            ViewData["WorkOrderID"] = new SelectList(_context.WorkOrders, "WorkOrderID", "WorkOrderID");
            return View();
        }

        // POST: WorkOrderHistories/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("Id,WorkOrderID,ColumnChanged,OldValue,NewValue,Timestamp")] WorkOrderHistory workOrderHistory)
        {
            if (ModelState.IsValid)
            {
                _context.Add(workOrderHistory);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            ViewData["WorkOrderID"] = new SelectList(_context.WorkOrders, "WorkOrderID", "WorkOrderID", workOrderHistory.WorkOrderID);
            return View(workOrderHistory);
        }

        // GET: WorkOrderHistories/Edit/5
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrderHistory = await _context.WorkOrderHistories.SingleOrDefaultAsync(m => m.Id == id);
            if (workOrderHistory == null)
            {
                return NotFound();
            }
            ViewData["WorkOrderID"] = new SelectList(_context.WorkOrders, "WorkOrderID", "WorkOrderID", workOrderHistory.WorkOrderID);
            return View(workOrderHistory);
        }

        // POST: WorkOrderHistories/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("Id,WorkOrderID,ColumnChanged,OldValue,NewValue,Timestamp")] WorkOrderHistory workOrderHistory)
        {
            if (id != workOrderHistory.Id)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(workOrderHistory);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!WorkOrderHistoryExists(workOrderHistory.Id))
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
            ViewData["WorkOrderID"] = new SelectList(_context.WorkOrders, "WorkOrderID", "WorkOrderID", workOrderHistory.WorkOrderID);
            return View(workOrderHistory);
        }

        // GET: WorkOrderHistories/Delete/5
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var workOrderHistory = await _context.WorkOrderHistories
                .Include(w => w.WorkOrder)
                .SingleOrDefaultAsync(m => m.Id == id);
            if (workOrderHistory == null)
            {
                return NotFound();
            }

            return View(workOrderHistory);
        }

        // POST: WorkOrderHistories/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var workOrderHistory = await _context.WorkOrderHistories.SingleOrDefaultAsync(m => m.Id == id);
            _context.WorkOrderHistories.Remove(workOrderHistory);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool WorkOrderHistoryExists(int id)
        {
            return _context.WorkOrderHistories.Any(e => e.Id == id);
        }
    }
}
