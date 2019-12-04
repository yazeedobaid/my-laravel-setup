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
* redis:5.0.7-alpine
* node:13.2.0-alpine3.10

The ```docker``` directory contains the ```build``` script. This script is used to build two images
for the application; an **app** and **node** images. The app image is the main image of the application which
contains Nginx, PHP-FPM and Supervisor. The node image is used for front-end development. The two images are scoped
under repository name **laravelapp**.

#### Docker compose
A ```docker-compose.yml``` file has been added to build and run containers from one command.
```
$ docker-compose up
```

The ```docker-compose.yml``` file take environment variables from the ```.env``` file and use it in setting 
services of the application.

##### Development with compose:
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

##### Data persistence:
The database data and redis cache are mounted to Docker volumes. The volumes are created in the compose file.
