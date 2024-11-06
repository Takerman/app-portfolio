using Microsoft.AspNetCore.Mvc;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class HomeController(IHomeService _homeService) : ControllerBase
    {
        [HttpGet("GetFooterLinks")] 
        public List<KeyValuePair<string, string>> GetFooterLinks()
        {
            return _homeService.GetFooterLinks();
        }
        
        [HttpGet("GetHighlights")] 
        public List<KeyValuePair<int, string>> GetHighlights()
        {
            return _homeService.GetHighlights();
        }
        
        [HttpGet("GetNavLinks")] 
        public List<KeyValuePair<string, string>> GetNavLinks()
        {
            return _homeService.GetNavLinks();
        }
        
        [HttpGet("GetSkills")] 
        public List<KeyValuePair<string, int>> GetSkills()
        {
            return _homeService.GetSkills();
        }
        
        [HttpGet("GetSocialLinks")] 
        public List<KeyValuePair<string, string>> GetSocialLinks()
        {
            return _homeService.GetSocialLinks();
        }

        [HttpGet("GetCompanies")]
        public List<KeyValuePair<string, string>> GetCompanies()
        {
            return _homeService.GetCompanies();
        }
    }
}