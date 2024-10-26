using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyos.Services
{
    public class HomeService : IHomeService
    {
        public List<KeyValuePair<string, string>> GetCompanies()
        {
            return [];
        }

        public List<KeyValuePair<string, string>> GetFooterLinks()
        {
            throw new NotImplementedException();
        }

        public List<KeyValuePair<int, string>> GetHighlights()
        {
            return [
                new KeyValuePair<int, string>(13, "Years"),
                new KeyValuePair<int, string>(200, "Technologies"),
                new KeyValuePair<int, string>(18, "Languages")
            ];
        }

        public List<KeyValuePair<string, string>> GetNavLinks()
        {
            return [
                new KeyValuePair<string, string>("Home", "/"),
                new KeyValuePair<string, string>("CV", "/cv"),
                new KeyValuePair<string, string>("Skills", "/skills"),
                new KeyValuePair<string, string>("Portfolio", "/portfolio"),
                new KeyValuePair<string, string>("Blog", "/blog"),
                new KeyValuePair<string, string>("Contacts", "/contacts")
            ];
        }

        public List<KeyValuePair<string, int>> GetSkills()
        {
            return new List<KeyValuePair<string, int>>();
        }

        public List<KeyValuePair<string, string>> GetSocialLinks()
        {
            return [
                new KeyValuePair<string, string>("ti-youtube", "https://www.youtube.com/channel/UCPTCSnkn2CtiVFc-EGdJycg"),
                new KeyValuePair<string, string>("ti-linkedin", "https://linkedin.com/in/tanyo-ivanov/"),
                new KeyValuePair<string, string>("ti-github", "https://github.com/takerman"),
                new KeyValuePair<string, string>("ti-github", "https://github.com/takermanltd")
            ];
        }
    }
}