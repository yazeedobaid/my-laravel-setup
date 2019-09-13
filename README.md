# my-laravel-setup
My Laravel Project initial setup. This repository contains my preferred setup of a Laravel project with the preferred packages to work on.

## Included Dependancies
* Laravel UI with Vue and Auth Scaffolding
* Font magician postcss plugin
* Tailwindcss
* Autoprefixer postcss plugin
* Purgecss postcss plugin
* Laravel mix postcss config plugin

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

### Development
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

### Production
Build assets for production:
```
$ npm run prod
```
