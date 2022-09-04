# Get the base image
FROM mcr.microsoft.com/dotnet/sdk:5.0 AS build-env
WORKDIR /app

# Copy the csproj and restore all of the nugets
COPY Tanyo.Portfolio.Web/*.csproj ./
RUN dotnet restore

# Copy everything else and build
COPY Tanyo.Portfolio.Web/. ./
RUN dotnet publish -c Release -o out

# Build runtime image
FROM mcr.microsoft.com/dotnet/sdk:5.0
WORKDIR /app
COPY --from=build-env /app/out .
ENTRYPOINT ["dotnet", "Tanyo.Portfolio.Web.dll"]