using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using EventLoggerAPI.Data;
using EventLoggerAPI.Models;
using System;
using System.Linq;
using System.Threading.Tasks;

namespace EventLoggerAPI.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EventLogsController : ControllerBase
    {
        private readonly ApplicationDbContext _context;

        public EventLogsController(ApplicationDbContext context)
        {
            _context = context;
        }

        // Obtener todos los eventos con filtros opcionales
        [HttpGet]
        public async Task<IActionResult> GetEvents([FromQuery] string? eventType, [FromQuery] DateTime? startDate, [FromQuery] DateTime? endDate)
        {
            var query = _context.EventLogs.AsQueryable();

            if (!string.IsNullOrEmpty(eventType))
            {
                query = query.Where(e => e.EventType == eventType);
            }
            if (startDate.HasValue)
            {
                query = query.Where(e => e.EventDate >= startDate.Value);
            }
            if (endDate.HasValue)
            {
                query = query.Where(e => e.EventDate <= endDate.Value);
            }

            var events = await query.OrderByDescending(e => e.EventDate).ToListAsync();
            return Ok(events);
        }

        // Registrar un nuevo evento
        [HttpPost]
        public async Task<IActionResult> CreateEvent([FromBody] EventLog eventLog)
        {
            if (!ModelState.IsValid)
                return BadRequest(ModelState);

            _context.EventLogs.Add(eventLog);
            await _context.SaveChangesAsync();

            return CreatedAtAction(nameof(GetEvents), new { id = eventLog.Id }, eventLog);
        }
    }
}
