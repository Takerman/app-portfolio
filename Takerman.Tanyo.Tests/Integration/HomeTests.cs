using Takerman.Tanyo.Services.Abstraction;
using Xunit.Abstractions;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Tanyo.Tests.Integration
{
    public class HomeTests : TestBed<TestFixture>
    {
        private readonly IHomeService? _homeService;


        public HomeTests(ITestOutputHelper testOutputHelper, TestFixture fixture)
        : base(testOutputHelper, fixture)
        {
            _homeService = _fixture.GetService<IHomeService>(_testOutputHelper);
        }
    }
}