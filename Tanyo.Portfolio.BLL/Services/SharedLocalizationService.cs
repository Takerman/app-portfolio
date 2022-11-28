using Microsoft.Extensions.Localization;
using System.Reflection;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.BLL.Services.Interfaces;

namespace Tanyo.Portfolio.BLL.Services
{
    public class SharedLocalizationService : ISharedLocalizationService
    {
        private readonly IStringLocalizer localizer;

        public SharedLocalizationService(IStringLocalizerFactory factory)
        {
            var assemblyName = new AssemblyName(typeof(SharedResource).GetTypeInfo().Assembly.FullName);
            localizer = factory.Create(nameof(SharedResource), assemblyName.Name);
        }

        public string Get(string key)
        {
            var result = localizer[key];
            return result;
        }
    }
}