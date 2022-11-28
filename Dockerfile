FROM mcr.microsoft.com/dotnet/sdk:7.0 AS build-env

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

WORKDIR /app/Tanyo.Portfolio.Web/
RUN dotnet publish -c Release -o out

FROM mcr.microsoft.com/dotnet/sdk:7.0
COPY --from=build-env /app/out .
ENTRYPOINT ["dotnet", "Tanyo.Portfolio.Web.dll"]