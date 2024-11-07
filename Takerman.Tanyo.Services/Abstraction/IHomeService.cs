
using Takerman.Mail;

namespace Takerman.Tanyo.Services.Abstraction
{
    public interface IHomeService
    {
        List<KeyValuePair<string, int>> GetSkills();

        Task SendMessageAsync(MailMessageDto message);
    }
}