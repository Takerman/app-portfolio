using Xunit.Abstractions;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Tanyo.Tests.Unit
{
    public class HomeTests(ITestOutputHelper testOutputHelper, TestFixture fixture) : TestBed<TestFixture>(testOutputHelper, fixture)
    {
        [Fact]
        public void Should_ReturnTrue_When_TheTestIsCalled()
        {
            Assert.True(true);
        }
    }
}