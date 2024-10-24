using Microsoft.Extensions.Logging;
using Microsoft.Extensions.Options;
using Microsoft.SqlServer.Management.Smo;
using System.Data;
using Takerman.Tanyo.Models.Configuration;
using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services;
using Takerman.Tanyo.Services.Abstraction;
using Takerman.Extensions;

namespace Takerman.Tanyos.Services
{
    public class TanyoService : DatabaseManagementBase, ITanyoService
    {
        private readonly IOptions<CommonConfig> _commonConfig;
        private readonly IOptions<ConnectionStrings> _connectionStrings;
        private readonly ILogger<TanyoService> _logger;

        public TanyoService(ILogger<TanyoService> logger, IOptions<ConnectionStrings> connectionStrings, IOptions<CommonConfig> commonConfig)
            : base(connectionStrings, logger)
        {
            _logger = logger;
            _connectionStrings = connectionStrings;
            _commonConfig = commonConfig;
            DbServer = new Server();
            DbServer.ConnectionContext.ConnectionString = _connectionStrings.Value.DefaultConnection;
            DbServer.ConnectionContext.Connect();
        }

        public Server DbServer { get; }

        public BackupDto Backup(string database)
        {
            var backupName = $"{database}_{DateTime.Now.Year}_{DateTime.Now.Month}_{DateTime.Now.Day}_{DateTime.Now.Hour}.bak";
            var backupLocation = Path.Combine(_commonConfig.Value.TanyoLocation, backupName);
            ExecuteQuery($"BACKUP DATABASE {database} TO DISK {backupLocation}");
            // var fileInfo = new FileInfo(backupLocation);
            var result = new BackupDto
            {
                Created = DateTime.Now, // fileInfo.CreationTime,
                Location = backupLocation,
                Name = backupName,
                Size = 0 // fileInfo.Length / 1024
            };

            return result;
        }

        public List<BackupDto> BackupAll()
        {
            var databases = new List<Database>();

            foreach (Database database in DbServer.Databases)
                databases.Add(database);

            var result = new List<BackupDto>();

            foreach (var database in databases)
                result.Add(Backup(database.Name));

            return result;
        }

        public bool Delete(string backupName)
        {
            try
            {
                var backup = GetAll().FirstOrDefault(x => x.Name == backupName);

                File.Delete(backup.Location);

                return true;
            }
            catch (Exception ex)
            {
                _logger.LogError("Error when deleting database: " + ex.GetMessage());

                return false;
            }
        }

        public bool DeleteAll(string database)
        {
            var tanyo = GetAll(database);

            foreach (var backup in tanyo)
                Delete(backup.Location);

            return true;
        }

        public BackupDto Get(string backup)
        {
            return GetAll().FirstOrDefault(x => x.Name.ToLower() == backup.ToLower());
        }

        public List<BackupDto> GetAll(string database = "")
        {
            var result = new List<BackupDto>();

            var files = Directory.EnumerateFiles(_commonConfig.Value.TanyoLocation).ToList();

            if (!string.IsNullOrEmpty(database))
                files = files.Where(x => x.Contains('\\') && x[x.LastIndexOf('\\')..].StartsWith(database)).ToList();

            foreach (var row in files)
            {
                var file = new FileInfo(row);

                result.Add(new BackupDto()
                {
                    Location = file.FullName,
                    Size = ((decimal)file.Length) / 1024,
                    Name = file.Name,
                    Created = file.CreationTime
                });
            }

            return result;
        }

        public bool Restore(string backup, string database)
        {
            try
            {
                ExecuteQuery($"RESTORE DATABASE {database} FROM DISK = '{backup}' WITH REPLACE");

                return true;
            }
            catch (Exception ex)
            {
                _logger.LogError("Error when restoring database: " + ex.GetMessage());

                return false;
            }
        }
    }
}