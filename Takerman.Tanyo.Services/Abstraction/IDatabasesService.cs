using Microsoft.SqlServer.Management.Smo;
using Takerman.Tanyo.Models.DTOs;

namespace Takerman.Tanyo.Services.Abstraction
{
    public interface IDatabasesService
    {
        bool Create(string database);

        bool Delete(string database);

        DatabaseDto Get(string database);

        List<DatabaseDto> GetAll();

        List<Database> GetAllAsEntity();

        Database GetAsEntity(string database);
    }
}