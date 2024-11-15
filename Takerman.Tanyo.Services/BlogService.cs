using Takerman.Tanyo.Models.DTOs;
using Takerman.Tanyo.Services.Abstraction;

namespace Takerman.Tanyo.Services
{
    public class BlogService : IBlogService
    {
        public List<BlogpostDto> GetBlogposts()
        {
            return [
                new () {
                    ID = 1,
                    Title = "Raspberry Pi Home Automation",
                    Content = @"In this blog post I will show you how I'm using some Raspberry PIs
                                                    for web server, media center, smar home, database server, to save pictures
                                                    from a camera and more.",
                    Image = "/images/blog/raspberry-pi-home-automation/raspberry-pi-cover.png",
                    Created = new DateTime(2020, 3, 7),
                    Name = "raspberrypi-home-automation"
                },
                new ()
                {
                    ID = 2,
                    Title = "Design Patterns Package",
                    Content = @"Here you can find a package with Design Patterns which I made while watching a YouTube channel. There is explanation and a video about all of them.",
                    Image = "/images/blog/designpatterns/designpatterns.png",
                    Created = new DateTime(2020, 3, 22),
                    Name = "designpatterns-package"
                },
                new ()
                {
                    ID = 3,
                    Title = "aws-summit-title-mini",
                    Content = @"aws-summit-content-mini",
                    Image = "/images/blog/aws-summit/aws-summit.png",
                    Created = new DateTime(2022, 11, 26),
                    Name = "aws-summit-2022"
                },
                new ()
                {
                    ID = 4,
                    Title = "fanless-home-lab-title-mini",
                    Content = @"fanless-home-lab-content-mini",
                    Image = "/images/blog/fanless/fanless.png",
                    Created = new DateTime(2022, 12, 18),
                    Name = "fanless-home-lab"
                },
                new ()
                {
                    ID = 5,
                    Title = "grafana-title-mini",
                    Content = @"grafana-content-mini",
                    Image = "/images/blog/grafana/logo.png",
                    Created = new DateTime(2022, 12, 18),
                    Name = "grafana-monitoring"
                },
                new ()
                {
                    ID = 6,
                    Title = "raid-title-mini",
                    Content = @"raid-content-mini",
                    Image = "/images/blog/raid/raid-server.jpg",
                    Created = new DateTime(2023, 5, 8),
                    Name = "raid-drives"
                },
                new ()
                {
                    ID = 7,
                    Title = "ransomware-title-mini",
                    Content = @"ransomware-title-mini",
                    Image = "/images/blog/ransomware/0xxx.png",
                    Created = new DateTime(2023, 6, 25),
                    Name = "ransomware"
                },
                new ()
                {
                    ID = 8,
                    Title = "ransomware -resolution-title-mini@",
                    Content = "ransomware-resolution-content-mini",
                    Image = "/images/blog/ransomware/0xxx.png",
                    Created = new DateTime(2024, 1, 20),
                    Name = "ransomware-resolution"
                }
            ];
        }
    }
}