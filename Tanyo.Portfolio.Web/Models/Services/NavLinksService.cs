using Microsoft.AspNetCore.Hosting;
using System.Collections.Generic;
using System.IO;
using System.Text.Json;

namespace Takerman.Portfolio.Web.Models.Services
{
    public class NavLinksService
    {
        public NavLinksService(IWebHostEnvironment webHostEnvironment)
        {
            WebHostEnvironment = webHostEnvironment;
        }

        public IWebHostEnvironment WebHostEnvironment { get; }

        private string GetFileName(string fileName)
        {
            return Path.Combine(WebHostEnvironment.WebRootPath, "data", fileName);
        }

        public IEnumerable<NavLink> GetNavLinks()
        {
            var filePath = GetFileName("nav-links.json");

            using (var jsonFileReader = File.OpenText(filePath))
            {
                return JsonSerializer.Deserialize<NavLink[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions()
                    {
                        PropertyNameCaseInsensitive = true
                    }); ;
            }
        }

        public IEnumerable<NavLink> GetSocialLinks()
        {
            var filePath = GetFileName("social-links.json");

            using (var jsonFileReader = File.OpenText(filePath))
            {
                return JsonSerializer.Deserialize<NavLink[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions()
                    {
                        PropertyNameCaseInsensitive = true
                    }); ;
            }
        }

        public IEnumerable<NavLink> GetCopyLinks()
        {
            var filePath = GetFileName("copy-links.json");

            using (var jsonFileReader = File.OpenText(filePath))
            {
                return JsonSerializer.Deserialize<NavLink[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions()
                    {
                        PropertyNameCaseInsensitive = true
                    }); ;
            }
        }

        public IEnumerable<Brand> GetBrands()
        {
            var filePath = GetFileName("brands.json");

            using (var jsonFileReader = File.OpenText(filePath))
            {
                return JsonSerializer.Deserialize<Brand[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions()
                    {
                        PropertyNameCaseInsensitive = true
                    }); ;
            }
        }
    }
}