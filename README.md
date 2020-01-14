# my-laravel-setup
My Laravel Project initial setup. This repository contains my preferred setup of a Laravel project with the preferred packages to work on.

## Included Dependancies
* Laravel UI with Vue and Auth Scaffolding
* Font magician postcss plugin
* Tailwindcss
* Autoprefixer postcss plugin
* Purgecss postcss plugin
* Laravel mix postcss config plugin
* Jest
* Eslint

## Setup
First, clone this repository or download it. Then

Install Composer dependencies using:
```
$ composer install
```

Install NPM dependencies using:
```
$ npm install
```

#### Development
Serving application to a local server:
```
$ php artisan serve
```

Watch assets files for changes:
```
$ npm run watch
```

Watch assets files with browser hot reload for changes:
```
$ npm run hot
```

#### Production
Build assets for production:
```
$ npm run prod
```

#### Linting
Linting Javascript and Vue components:
```
$ npm run lint
```

Fixing linting problems:
```
$ npm run lint:fix
```

## Docker
The ```docker``` directory at the root of the project contains all Docker files and scripts
to start using Docker with the application. The Docker setup depends on these official Docker images.
* ubuntu:18.04
* mysql:5.7
* redis:5.0.7
* node:13.2.0-alpine3.10

The compose file build two images; The **app** image and **node** image. The app image is the main image for the application which
contains Nginx, PHP-FPM and Supervisor. The node image is used for front-end development. The two images are scoped
under repository name **laravelapp**.

### Docker compose
A ```docker-compose.yml``` file has been added to build and run containers from one command.
```
$ docker-compose up
```

The ```docker-compose.yml``` file take environment variables from the ```.env``` file and use it in building and running 
the services of the application.

#### Development with compose:
To running commands against docker-compose containers the ```docker-run``` script can be used. The script
translate the arguments given to it and execute them in the correct container. The following table shows usage examples:

| Command                     | Container   | Example                           |
|-----------------------------|-------------|-----------------------------------|
| ./docker-run composer ...   | app         | `./docker-run composer dump -o`   |
| ./docker-run artisan ...    | app         | `./docker-run artisan migrate`    |
| ./docker-run redis ...      | redis       | `./docker-run redis set foo bar`  |
| ./docker-run mysql ...      | mysql       | `./docker-run mysql -u root -p`   |
| ./docker-run npm ...        | node        | `./docker-run npm run watch`      |
| ./docker-run ...            | app         | `./docker-run ls`                 |

<br />
<br />

>All services of docker compose redirect their logs to the STDOUT and STDERR, so when running ```docker-compose up```
>the logs will be redirected to terminal.

### Docker Swarm
A compose file is included in the ```docker``` directory to be deploy application to a swarm cluster. The compose file define a stack for the application. The stack has a **web**, **mysql** and **redis** services. The web service uses an image that will contain the application code ready for production use. This service runs in replica mode with 3 replicas. The mysql and redis services run using DNSRR (DNS Round-Robin) entry point mode with single replica on a manager node. DNS Round-Robin mode is used since these services has single task, hence no need for virtual network in front of these two services. The compose file has environment variables, like credentials. That need to be replaced with application specific ones.

To deploy to swarm. First initialize a swarm and join other nodes to the cluster. Then edit the stack compose file ```docker-stack.yml``` in ```docker``` directory and substitute the environment variables with your own ones. Then execute the following command on a manager node;
```
$ docker stack deploy -c docker/docker-stack.yml
```
>The web service is expected to contain the application code ready for production use.

### Data persistence:
The database data and redis cache data are mounted to Docker named volumes in the two (development and production environments) compose files.

### Caveats
* A .env file must be created as usual in the root directory of the project. Docker compose use that file in
building the services containers.
* For MYSQL, to use the root user remove the **MYSQL_USER** and **MYSQL_PASSWORD** environment variables from mysql service in
docker-compose file.
* Changing MYSQL credentials in docker-compose for .env file will not take effect in an already created database (check MYSQL docs in hub.docker)
* When deploying to production using Docker stack, edit the docker/docker-stack.yml file and replace the environment variables in the file with your own.
