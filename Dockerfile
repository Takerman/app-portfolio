FROM mcr.microsoft.com/dotnet/aspnet:9.0 AS base
ARG SLACK_EXCEPTIONS
ENV SLACK_WEBHOOK_URL=$SLACK_EXCEPTIONS
ENV ASPNETCORE_ENVIRONMENT=Production
WORKDIR /app
EXPOSE 80
EXPOSE 443
RUN apt update && apt install -y curl gnupg libpng-dev libjpeg-dev curl libxi6 build-essential libgl1-mesa-glx
RUN curl -fsSL https://deb.nodesource.com/nsolid_setup_deb.sh | sh -s 20
RUN apt-get install -y nodejs

FROM mcr.microsoft.com/dotnet/sdk:9.0 AS build
ENV ASPNETCORE_ENVIRONMENT=Production
WORKDIR /src
RUN apt update && apt install -y curl libpng-dev libjpeg-dev curl libxi6 build-essential libgl1-mesa-glx
RUN curl -fsSL https://deb.nodesource.com/nsolid_setup_deb.sh | sh -s 20
RUN apt-get install -y nodejs
ARG BUILD_CONFIGURATION=Release
ARG NUGET_PASSWORD
ARG SLACK_EXCEPTIONS
ENV SLACK_WEBHOOK_URL=$SLACK_EXCEPTIONS

COPY . .

COPY ["takerman.tanyo.client/nuget.config", "./"]
COPY ["takerman.tanyo.client/package.json", "package.json"]

RUN sed -i "s|</configuration>|<packageSourceCredentials><github><add key=\"Username\" value=\"takerman\"/><add key=\"ClearTextPassword\" value=\"${NUGET_PASSWORD}\"/></github></packageSourceCredentials></configuration>|" nuget.config
RUN dotnet nuget add source https://nuget.pkg.github.com/takermanltd/index.json --name github
RUN echo //npm.pkg.github.com/:_authToken=$NUGET_PASSWORD >> ~/.npmrc
RUN echo @takermanltd:registry=https://npm.pkg.github.com/ >> ~/.npmrc
RUN echo "user.email=tivanov@takerman.net" > .npmrc
RUN echo "user.name=takerman" > .npmrc
RUN echo "user.username=takerman" > .npmrc
RUN npm install --production

WORKDIR "/src/Takerman.Tanyo.Tests"
RUN dotnet test

WORKDIR "/src/Takerman.Tanyo.Server"
RUN dotnet clean && dotnet restore && dotnet build -c $BUILD_CONFIGURATION -o /app/build
RUN rm -f .npmrc

FROM build AS publish
ARG BUILD_CONFIGURATION=Release
RUN dotnet publish -c $BUILD_CONFIGURATION -o /app/publish /p:UseAppHost=false

FROM base AS final
WORKDIR /app
COPY --from=publish /app/publish .
ENTRYPOINT ["dotnet", "Takerman.Tanyo.Server.dll"]