# Online Resume
<a href="https://img.shields.io/github/downloads/takerman/tanyo.portfolio/latest/total">
<img src="https://img.shields.io/github/downloads/takerman/tanyo.portfolio/latest/total" alt="build status"></a>

Hello visitors!
The purpose of this project is not to be just implemented and to use the most suitable technologies for it, bu is mostly to show knowledge in some of the newest technologies and to practice them.

## Description
This is a web project which shows the qualities and CV of Tanyo Ivanov. 
There would be included many features which makes easier for the recruiter and the companies to get better feeling of what the profile can do from technical point of view.

## Technologies and Metodologies
* BDD with SpecFlow
* Angular
* ASP.NET Web API Core
* GraphQL
* SQLite database with Entity Framework Core
* Repository-Service Pattern
* Thin Headless CMS for a backoffice
* Docker containerisation
* xUnit Tests
* Selenium Testing
* CI/CD to hosting

## Features
Some of the features includes
* Menu items in different locations
* Barcharts with qualities
* Rectangles with stats
* Short brief about the profile
* Radar chart with qualities
* Services list
* Testimonials
* Trustpilot reviews
* Blog list
* Social links
* CV and positions
* Pricing table
* Qualities table
* Portfolio with portfolio items
* Blog with blogposts
* Contact form
* Languages selector


docker build -t tanyoivanov .
docker tag tanyoivanov takerman/tanyoivanov:latest
docker push takerman/tanyoivanov:latest
docker run -d -p 8084:80 takerman/tanyoivanov:latest
Visit http://localhost:8084