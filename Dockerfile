# Get the base image
FROM mcr.microsoft.com/dotnet/sdk:7.0 AS build-env
WORKDIR /app

# Copy the csproj and restore all of the nugets
COPY Tanyo.Portfolio.Data/*.csproj ./Tanyo.Portfolio.Data/
COPY Tanyo.Portfolio.BLL/*.csproj ./Tanyo.Portfolio.BLL/
COPY Tanyo.Portfolio.Web/*.csproj ./Tanyo.Portfolio.Web/
COPY Tanyo.Portfolio.Web.Tests/*.csproj ./Tanyo.Portfolio.Web.Tests/
RUN dotnet restore

# Copy everything else and build
COPY Tanyo.Portfolio.Data/. ./Tanyo.Portfolio.Data/
COPY Tanyo.Portfolio.BLL/. ./Tanyo.Portfolio.BLL/
COPY Tanyo.Portfolio.Web/. ./Tanyo.Portfolio.Web/
COPY Tanyo.Portfolio.Web.Tests/. ./Tanyo.Portfolio.Web.Tests/

WORKDIR /app/Tanyo.Portfolio.Web
RUN dotnet publish -c Release -o out

# Build runtime image
FROM mcr.microsoft.com/dotnet/sdk:7.0
WORKDIR /app
COPY --from=build-env /app/out .
ENTRYPOINT ["dotnet", "Tanyo.Portfolio.Web.dll"]