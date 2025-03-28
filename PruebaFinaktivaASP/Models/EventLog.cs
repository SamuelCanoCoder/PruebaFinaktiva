using System;
using System.ComponentModel.DataAnnotations;

namespace EventLoggerAPI.Models
{
    public class EventLog
    {
        [Key]
        public int Id { get; set; }

        public DateTime EventDate { get; set; } = DateTime.Now;

        [Required]
        [StringLength(255)]
        public string Description { get; set; }

        [Required]
        [StringLength(50)]
        public string EventType { get; set; }
    }
}
