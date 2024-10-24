using Takerman.Tanyo.Models.DTOs;

namespace Takerman.Tanyo.Services.Abstraction
{
    public interface ITanyoService
    {
        BackupDto Backup(string database);

        List<BackupDto> BackupAll();

        bool Delete(string backupName);

        bool DeleteAll(string database);

        BackupDto Get(string backup);

        List<BackupDto> GetAll(string database = "");

        bool Restore(string backup, string database);
    }
}