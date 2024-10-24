using Microsoft.Extensions.Logging;
using Microsoft.Extensions.Options;
using Microsoft.SqlServer.Management.Smo;
using Takerman.Tanyo.Models.Configuration;
using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyos.Services
{
    public class DatabasesService : DatabaseManagementBase, IDatabasesService
    {
        private readonly IOptions<ConnectionStrings> _connectionStrings;
        private readonly ILogger<DatabasesService> _logger;

        public DatabasesService(ILogger<DatabasesService> logger, IOptions<ConnectionStrings> connectionStrings)
            : base(connectionStrings, logger)
        {
            _logger = logger;
            _connectionStrings = connectionStrings;
            DbServer = new Server();
            DbServer.ConnectionContext.ConnectionString = _connectionStrings.Value.DefaultConnection;
            DbServer.ConnectionContext.Connect();
        }

        public Server DbServer { get; }

        public bool Create(string database)
        {
            ExecuteQuery($"CREATE DATABASE {database}");

            return true;
        }

        public bool Delete(string database)
        {
            ExecuteQuery($"DROP DATABASE {database}");

            return false;
        }

        public DatabaseDto Get(string database)
        {
            return GetAll().FirstOrDefault(x => x.Name.ToLower() == database.ToLower());
        }

        public List<DatabaseDto> GetAll()
        {
            var result = GetAllAsEntity().Select(x => new DatabaseDto()
            {
                Name = x.Name,
                Size = x.Size,
                Location = x.PrimaryFilePath
            }).ToList();

            return result;
        }

        public List<Database> GetAllAsEntity()
        {
            var result = new List<Database>();

            foreach (Database database in DbServer.Databases)
                result.Add(database);

            return result;
        }

        public Database GetAsEntity(string database)
        {
            return GetAllAsEntity().FirstOrDefault(x => x.Name.ToLower() == database.ToLower());
        }
    }
}