FROM mcr.microsoft.com/dotnet/sdk:8.0 AS build
ARG SLACK_EXCEPTIONS
ENV SLACK_WEBHOOK_URL=$SLACK_EXCEPTIONS
ENV ASPNETCORE_ENVIRONMENT Production
ARG BUILD_CONFIGURATION=Release
ARG NUGET_PASSWORD

WORKDIR /app

# Copy nuget.config and configure GitHub packages
COPY nuget.config ./
RUN if [ ! -z "$NUGET_PASSWORD" ]; then \
  sed -i "s|</configuration>|<packageSourceCredentials><github><add key=\"Username\" value=\"takerman\"/><add key=\"ClearTextPassword\" value=\"${NUGET_PASSWORD}\"/></github></packageSourceCredentials></configuration>|" nuget.config; \
  dotnet nuget add source https://nuget.pkg.github.com/takermanltd/index.json --name github; \
  fi

# Copy solution file and project files for dependency restoration
COPY *.sln ./
COPY Tanyo.Portfolio.Data/*.csproj ./Tanyo.Portfolio.Data/
COPY Tanyo.Portfolio.BLL/*.csproj ./Tanyo.Portfolio.BLL/
COPY Tanyo.Portfolio.Web/*.csproj ./Tanyo.Portfolio.Web/
COPY Tanyo.Portfolio.Web.Tests/*.csproj ./Tanyo.Portfolio.Web.Tests/

# Restore dependencies
RUN dotnet restore

# Copy source code
COPY . ./

# Build and test
RUN dotnet build --configuration $BUILD_CONFIGURATION --no-restore
RUN dotnet test --configuration $BUILD_CONFIGURATION --no-build --verbosity normal

# Publish the web application
RUN dotnet publish Tanyo.Portfolio.Web/Tanyo.Portfolio.Web.csproj --configuration $BUILD_CONFIGURATION --no-build --output /app/publish

# Runtime stage
FROM mcr.microsoft.com/dotnet/aspnet:8.0 AS runtime
WORKDIR /app

# Copy published application
COPY --from=build /app/publish ./

# Configure the app to listen on port 8080
EXPOSE 8080
ENV ASPNETCORE_URLS=http://+:8080
ENV ASPNETCORE_ENVIRONMENT=Production

ENTRYPOINT ["dotnet", "Tanyo.Portfolio.Web.dll"]