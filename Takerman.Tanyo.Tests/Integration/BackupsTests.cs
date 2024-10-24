using Takerman.Tanyo.Services.Abstraction;
using Xunit.Abstractions;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Tanyo.Tests.Integration
{
    public class TanyoTests : TestBed<TestFixture>
    {
        private readonly ITanyoService? _tanyoService;


        public TanyoTests(ITestOutputHelper testOutputHelper, TestFixture fixture)
        : base(testOutputHelper, fixture)
        {
            _tanyoService = _fixture.GetService<ITanyoService>(_testOutputHelper);
        }

        [Fact(Skip = "Build")]
        public void Should_BackupAllDatabase_When_ConnectedToTheServer()
        {
            var result = _tanyoService.BackupAll();

            Assert.NotNull(result);
        }

        [Fact(Skip = "Build")]
        public void Should_BackupDatabase_When_ConnectedToTheServer()
        {
            var result = _tanyoService.Backup("takerman_dating_dev");

            Assert.NotNull(result);
        }

        [Fact(Skip = "Build")]
        public void Should_GetAllTanyo_When_ConnectedToTheServer()
        {
            var result = _tanyoService.GetAll();

            Assert.NotNull(result);
        }
    }
}