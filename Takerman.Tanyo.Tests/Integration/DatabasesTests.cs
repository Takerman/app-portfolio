using Takerman.Tanyo.Services.Abstraction;
using Xunit.Abstractions;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Tanyo.Tests.Integration
{
    public class DatabasesTests : TestBed<TestFixture>
    {
        private readonly IDatabasesService? _databaseService;


        public DatabasesTests(ITestOutputHelper testOutputHelper, TestFixture fixture)
        : base(testOutputHelper, fixture)
        {
            _databaseService = _fixture.GetService<IDatabasesService>(_testOutputHelper);
        }

        [Fact(Skip = "Build")]
        public void Should_DeleteDatabase_When_ConnectedToTheServer()
        {
            var created = _databaseService.Create("takerman_test");

            Assert.True(created);

            var result = _databaseService.Delete("takerman_test");

            Assert.True(result);
        }

        [Fact(Skip = "Build")]
        public void Should_CreateDatabase_When_ConnectedToTheServer()
        {
            var result = _databaseService.Create("takerman_test");

            Assert.True(result);
        }

        [Fact(Skip = "Build")]
        public void Should_GetAllDatabases_When_ConnectedToTheServer()
        {
            var result = _databaseService.GetAll();

            Assert.NotNull(result);
        }

        [Fact(Skip = "Build")]
        public void Should_GetDatabase_When_ConnectedToTheServer()
        {
            var result = _databaseService.Get("master");

            Assert.NotNull(result);
        }
    }
}