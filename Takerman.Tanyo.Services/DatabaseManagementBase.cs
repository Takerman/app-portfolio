using Microsoft.Data.SqlClient;
using Microsoft.Extensions.Logging;
using Microsoft.Extensions.Options;
using Takerman.Tanyo.Models.Configuration;
using Takerman.Extensions;

namespace Takerman.Tanyo.Services
{
    public abstract class DatabaseManagementBase(IOptions<ConnectionStrings> _connectionString, ILogger<DatabaseManagementBase> _logger)
    {
        public void ExecuteQuery(string query)
        {
            using var connection = new SqlConnection(_connectionString.Value.DefaultConnection);
            var command = new SqlCommand(query, connection);
            connection.Open();

            try
            {
                command.ExecuteNonQuery();
            }
            catch (Exception ex)
            {
                _logger.LogError("Error when executing command: " + ex.GetMessage());
            }
            finally
            {
                command.Dispose();
                connection.Close();
                connection.Dispose();
            }
        }
    }
}