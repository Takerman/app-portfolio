FROM mcr.microsoft.com/dotnet/sdk:9.0 AS build
ARG SLACK_EXCEPTIONS
ENV SLACK_WEBHOOK_URL=$SLACK_EXCEPTIONS
ENV ASPNETCORE_ENVIRONMENT Production
ARG BUILD_CONFIGURATION=Release
ARG NUGET_PASSWORD

WORKDIR /app
COPY nuget.config ./
RUN sed -i "s|</configuration>|<packageSourceCredentials><github><add key=\"Username\" value=\"takerman\"/><add key=\"ClearTextPassword\" value=\"${NUGET_PASSWORD}\"/></github></packageSourceCredentials></configuration>|" nuget.config
RUN dotnet nuget add source https://nuget.pkg.github.com/takermanltd/index.json --name github
RUN dotnet nuget list source
ARG SLACK_EXCEPTIONS
ENV SLACK_WEBHOOK_URL=$SLACK_EXCEPTIONS

WORKDIR /app
COPY Tanyo.Portfolio.Data/*.csproj ./Tanyo.Portfolio.Data/
WORKDIR /app/Tanyo.Portfolio.Data/
RUN dotnet restore

WORKDIR /app
COPY Tanyo.Portfolio.BLL/*.csproj ./Tanyo.Portfolio.BLL/
WORKDIR /app/Tanyo.Portfolio.BLL/
RUN dotnet restore

WORKDIR /app
COPY Tanyo.Portfolio.Web/*.csproj ./Tanyo.Portfolio.Web/
WORKDIR /app/Tanyo.Portfolio.Web/
RUN dotnet restore

WORKDIR /app
COPY Tanyo.Portfolio.Web.Tests/*.csproj ./Tanyo.Portfolio.Web.Tests/
WORKDIR /app/Tanyo.Portfolio.Web.Tests/
RUN dotnet restore

WORKDIR /app
COPY Tanyo.Portfolio.Data/. ./Tanyo.Portfolio.Data/
COPY Tanyo.Portfolio.BLL/. ./Tanyo.Portfolio.BLL/
COPY Tanyo.Portfolio.Web/. ./Tanyo.Portfolio.Web/
COPY Tanyo.Portfolio.Web.Tests/. ./Tanyo.Portfolio.Web.Tests/

WORKDIR /app/Tanyo.Portfolio.Web.Tests/
RUN dotnet clean ./*.csproj
RUN dotnet build ./*.csproj
# RUN dotnet test ./*.csproj --logger "trx;LogFileName=Tanyo.Portfolio.Web.Tests.trx" 

WORKDIR /app/Tanyo.Portfolio.Web/
RUN dotnet publish -c Release -o out

FROM mcr.microsoft.com/dotnet/sdk:8.0 AS runtime
WORKDIR /app
COPY --from=build /app/Tanyo.Portfolio.Web/out ./

ENTRYPOINT ["dotnet", "Tanyo.Portfolio.Web.dll"]