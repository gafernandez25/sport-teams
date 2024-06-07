# Set up the environment

## Containers

1) After cloning the repository you can change container names and ports if you desire in docker-compose.yml file
   located in directory root.

``` sh
    webserver:
    container_name: sport-teams-nginx
    restart: on-failure
    image: 'nginx:alpine'
    ports:
      - "8000:80"
```

> Take in consideration that command examples in this file are based in the parameter values from the original docker
> compose file. If some of them are modified adjust the commands.

There is no need to change anything else in Dockerfile and other docker config files.

2) Once configured docker compose you can create the images and containers.

``` sh
docker-compose up -d
```

## Source code

1) Once containers are created enter to php-fpm container as root user. It's recommended to execute every cli commands
   from
   inside the container.

``` sh
docker exec -ti sport-teams-php-fpm bash
```

2) Once inside the container you must install dependencies.

``` sh
composer install
```

3) Create environment variables from example file and fill missing variables (root user and password)

``` sh
cp .env.example .env
```

## Database

Execute SQL queries inside SQL directory to create database and tables

### Disclaimers:

> As this is a DEMO repository I take the liberty to expose credentials inside some commited files.

> Some sensitive values inside .env file, docker compose file, etc. should be store in secrets places ideally outside 
> this environment, e.g. AWS secrets.

Everything set up, enjoy it!! :smiley:
