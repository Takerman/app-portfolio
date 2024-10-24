using Microsoft.Extensions.Logging;
using Microsoft.Extensions.Options;
using Microsoft.SqlServer.Management.Smo;
using System.Data;
using Takerman.Tanyo.Models.Configuration;
using Takerman.Tanyo.Services.Abstraction;
using Takerman.Extensions;

namespace Takerman.Tanyos.Services
{
    public class HomeService : IHomeService
    {
        private readonly IOptions<CommonConfig> _commonConfig;
        private readonly IOptions<ConnectionStrings> _connectionStrings;
        private readonly ILogger<HomeService> _logger;

        public HomeService(ILogger<HomeService> logger, IOptions<ConnectionStrings> connectionStrings, IOptions<CommonConfig> commonConfig)
        {
            _logger = logger;
            _connectionStrings = connectionStrings;
            _commonConfig = commonConfig;
        }
    }
}