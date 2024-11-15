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
                    Title = "AWS Summit 2022 Conference - London, Excel",
                    Content = @"The annual AWS conference in London. This year (2022), I went to the conference in Excel, London. It was quite interesting to attend. Read the full article for more info.",
                    Image = "/images/blog/aws-summit/aws-summit.png",
                    Created = new DateTime(2022, 11, 26),
                    Name = "aws-summit-2022"
                },
                new ()
                {
                    ID = 4,
                    Title = "Home server without fans",
                    Content = @"This home server turned out to be something amazing. No fans, consumes almost no power and is super powerful",
                    Image = "/images/blog/fanless/fanless.png",
                    Created = new DateTime(2022, 12, 18),
                    Name = "fanless-home-lab"
                },
                new ()
                {
                    ID = 5,
                    Title = "Grafana monitoring",
                    Content = @"For my current configuration, I use Grafana monitoring to monitor server and container performance. In the post you can read about Grafana and other tools like DataDog",
                    Image = "/images/blog/grafana/logo.png",
                    Created = new DateTime(2022, 12, 18),
                    Name = "grafana-monitoring"
                },
                new ()
                {
                    ID = 6,
                    Title = "RAID-1 mirror backups",
                    Content = @"In the post I am describing the setup of hard drives which I am using for my home lab",
                    Image = "/images/blog/raid/raid-server.jpg",
                    Created = new DateTime(2023, 5, 8),
                    Name = "raid-drives"
                },
                new ()
                {
                    ID = 7,
                    Title = "I've got 0xxx ransomware",
                    Content = @"I've got 0xxx ransomware",
                    Image = "/images/blog/ransomware/0xxx.png",
                    Created = new DateTime(2023, 6, 25),
                    Name = "ransomware"
                },
                new ()
                {
                    ID = 8,
                    Title = "No resolution of the problem with the Ransomware",
                    Content = "In this story I will tell you what I've been through after the ransomware attack and how I turned back to my favourte OS - DietPi",
                    Image = "/images/blog/ransomware/0xxx.png",
                    Created = new DateTime(2024, 1, 20),
                    Name = "ransomware-resolution"
                }
            ];
        }
    }
}