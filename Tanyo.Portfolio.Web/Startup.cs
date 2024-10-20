using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Localization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Razor;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;
using Microsoft.Net.Http.Headers;
using Serilog;
using Serilog.Events;
using Serilog.Sinks.Slack;
using Serilog.Sinks.Slack.Models;
using System;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using Takerman.Logging;
using Takerman.Mail;
using Tanyo.Portfolio.BLL.Services;
using Tanyo.Portfolio.BLL.Services.Interfaces;
using Tanyo.Portfolio.Data.Contexts;
using Tanyo.Portfolio.Data.Entities;
using Tanyo.Portfolio.Web.Models.Services;

namespace Tanyo.Portfolio.Web
{
    public class Startup(IConfiguration configuration, IWebHostEnvironment env)
    {
        public const string DefaultCulture = "en";

        public readonly CultureInfo[] SupportedCultures =
        [
            new CultureInfo(DefaultCulture),
            new CultureInfo("de"),
            new CultureInfo("bg"),
            new CultureInfo("ru")
        ];

        public IConfiguration Configuration { get; } = configuration;

        public IWebHostEnvironment Env { get; } = env;

        public void Configure(IApplicationBuilder app, IWebHostEnvironment env)
        {
            if (env.IsDevelopment())
            {
                app.UseDeveloperExceptionPage();
            }
            else
            {
                app.UseExceptionHandler("/Error");
                app.UseStatusCodePagesWithReExecute("/Error/{0}");

                app.UseHsts();
            }

            var cachePeriod = env.IsDevelopment() ? "600" : "604800";

            app.UseStaticFiles(new StaticFileOptions
            {
                OnPrepareResponse = (context) =>
                {
                    var headers = context.Context.Response.GetTypedHeaders();
                    headers.CacheControl = new CacheControlHeaderValue
                    {
                        Public = true,
                        MaxAge = TimeSpan.FromDays(Configuration.GetValue<int>("CacheDays"))
                    };
                    context.Context.Response.Headers.Append("Cache-Control", $"public, max-age={cachePeriod}");
                }
            });

            app.UseRouting();

            app.UseStatusCodePages();

            app.UseRequestLocalization();

            app.UseEndpoints(endpoints =>
            {
                endpoints.MapControllerRoute(
                    name: "default",
                    pattern: "{controller=Home}/{action=Index}/{id?}");
            });
        }

        public void ConfigureServices(IServiceCollection services)
        {
            AddServices(services);
            AddHsts(services);
            AddLocalization(services);

            services.AddControllersWithViews();
            services.AddMvc(option =>
            {
                option.EnableEndpointRouting = false;
                option.CacheProfiles.Add("Default", new CacheProfile() { Duration = 30 });
            }).AddViewLocalization(LanguageViewLocationExpanderFormat.Suffix)
            .AddDataAnnotationsLocalization(options => { options.DataAnnotationLocalizerProvider = (type, factory) => factory.Create(typeof(SharedResource)); });
        }

        private void AddHsts(IServiceCollection services)
        {
            services.AddHsts(options =>
            {
                options.Preload = true;
                options.IncludeSubDomains = true;
                options.MaxAge = TimeSpan.FromDays(60);

                options.ExcludedHosts.Add("takerman.net");
                options.ExcludedHosts.Add("www.takerman.net");

                options.ExcludedHosts.Add("tanyoivanov.net");
                options.ExcludedHosts.Add("www.tanyoivanov.net");
            });
        }

        private void AddLocalization(IServiceCollection services)
        {
            services.AddLocalization(options => options.ResourcesPath = "Resources");
            var provider = new CustomRequestCultureProvider(async (HttpContext) =>
            {
                await Task.Yield();

                var culture = DefaultCulture;

                try
                {
                    var cookie = HttpContext.Request.Cookies[CookieRequestCultureProvider.DefaultCookieName];

                    if (cookie != null)
                    {
                        culture = cookie.Split('=').LastOrDefault();
                    }
                }
                catch
                {
                }

                var ci = new CultureInfo(culture);

                return new ProviderCultureResult(ci.Name);
            });
            services.Configure<RequestLocalizationOptions>(options =>
            {
                options.DefaultRequestCulture = new RequestCulture(DefaultCulture);
                options.SupportedCultures = SupportedCultures;
                options.SupportedUICultures = SupportedCultures;
                options.RequestCultureProviders.Insert(0, provider);
            });
        }

        private void AddServices(IServiceCollection services)
        {
            services.AddLogging((x) =>
            {
                x.AddTakermanLogging();
            });
            services.AddDbContext<DefaultContext>((options) =>
            {
                options.UseSqlite("Data Source=" + Path.Combine(Environment.CurrentDirectory, "tanyo_data.db3;"), b => b.MigrationsAssembly("Takerman.Portfolio.Data"));
                options.EnableSensitiveDataLogging();
                options.EnableDetailedErrors();
            });
            services.AddTransient<DbContext, DefaultContext>();
            services.AddSingleton<IHttpContextAccessor, HttpContextAccessor>();
            services.AddSingleton<SharedLocalizationService>();
            services.AddScoped<INavLinksService, NavLinksService>();
            services.AddScoped<ISocialLinksService, SocialLinksService>();
            services.AddScoped<ICopyLinksService, CopyLinksService>();
            services.AddScoped<ICompaniesService, CompaniesService>();
            services.AddScoped<ISkillsService, SkillsService>();
            services.AddScoped<IPricingService, PricingService>();
            services.AddScoped<IProjectsService, ProjectsService>();
            services.AddScoped<IBlogService, BlogService>();
            services.AddScoped<IStatsService, StatsService>();
            services.AddSingleton<IMailService, MailService>();
            services.Configure<RabbitMqConfig>(Configuration.GetSection(nameof(RabbitMqConfig)));
            services.AddRecaptchaService();
        }
    }
}