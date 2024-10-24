using Microsoft.AspNetCore.Mvc;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class TanyoController(ILogger<DatabasesController> _logger, ITanyoService _tanyoService) : ControllerBase
    {
        [HttpGet("Get")]
        public IActionResult Get(string backup)
        {
            var result = _tanyoService.Get(backup);

            return Ok(result);
        }

        [HttpGet("GetForDatabase")]
        public IActionResult GetForDatabase(string database)
        {
            var result = _tanyoService.GetAll(database);

            return Ok(result);
        }

        [HttpGet("GetAll")]
        public IActionResult GetAll()
        {
            var result = _tanyoService.GetAll();

            return Ok(result);
        }

        [HttpGet("Backup")]
        public IActionResult Backup(string database)
        {
            var result = _tanyoService.Backup(database);

            return Ok(result);
        }

        [HttpGet("BackupAll")]
        public IActionResult BackupAll()
        {
            var result = _tanyoService.BackupAll();

            return Ok(result);
        }

        [HttpGet("Restore")]
        public IActionResult Restore(string backup, string database)
        {
            var result = _tanyoService.Restore(backup, database);

            return Ok(result);
        }

        [HttpGet("Delete")]
        public IActionResult Delete(string backup)
        {
            var result = _tanyoService.Delete(backup);

            return Ok(result);
        }

        [HttpGet("DeleteAll")]
        public IActionResult DeleteAll(string database)
        {
            var result = _tanyoService.DeleteAll(database);

            return Ok(result);
        }
    }
}