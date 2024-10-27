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
            return
            [
                new("SpecFlow", 1),
                new("Vue.js", 1),
                new("WPF", 1),
                new("MS Tests", 3),
                new("NUnit Tests", 5),
                new("xUnit Tests", 5),
                new("Angular", 1),
                new("Umbraco", 2),
                new("Linux/Unix", 7),
                new("Git", 10),
                new("Docker", 7),
                new("jQuery", 10),
                new("Async and Paralell", 7),
                new("Multi-Threading", 0),
                new("Design Patterns", 3),
                new("Load Testing", 1),
                new("ASP.NET Web API", 10),
                new("Entity Framework Core", 5),
                new("Entity Framework", 10),
                new("Bootstrap", 8),
                new("C#", 13),
                new("Test Automation", 5),
                new("Agile", 8),
                new("Windows Forms", 4),
                new("Windows Server", 7),
                new("TypeScript", 4),
                new("Amazon EC2", 5),
                new("Windows Server", 7),
                new("Selenium", 1),
                new("SQL Server", 8),
                new("T-SQL", 5),
                new("SQL", 8),
                new("AWS", 5),
                new("ASP.NET MVC", 11),
                new("JavaScript", 10),
                new("IoT", 2),
                new("HTML5", 9),
                new("HTML", 11),
                new("CSS", 11),
                new("Bash", 8),
                new("ASP.NET", 11),
                new(".NET Framework", 11),
                new("Vue", 3),
                new("Jest", 3),
                new("Cypress", 3),
                new("Terraform", 3),
                new("Splunk", 3),
                new("DataDog", 3)
            ];
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