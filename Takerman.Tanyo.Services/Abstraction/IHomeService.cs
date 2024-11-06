namespace Takerman.Tanyo.Services.Abstraction
{
    public interface IHomeService
    {
        List<KeyValuePair<string, string>> GetCompanies();
        
        List<KeyValuePair<string, string>> GetFooterLinks();

        List<KeyValuePair<int, string>> GetHighlights();

        List<KeyValuePair<string, string>> GetNavLinks();

        List<KeyValuePair<string, int>> GetSkills();

        List<KeyValuePair<string, string>> GetSocialLinks();
    }
}