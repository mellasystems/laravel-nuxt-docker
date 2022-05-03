# nuxt-auth-with-laravel-sanctum-docker

My CRUD project built with [**Laravel**](https://laravel.com/) as server side language, [**NuxtJS**](https://nuxtjs.org/) and [**Boostrap5**](https://getbootstrap.com/) as frontend framework and [**PostgreSQL**](https://www.postgresql.org/) as database server.

## Features Implemented

1. CRUD Employee With Laravel API
2. Simple notifications for validation actions
3. Authentication using [**Laravel Sanctum**](https://www.npmjs.com/package/jsonwebtoken) and [**@nuxtjs/auth**](https://auth.nuxtjs.org/) module.



## Build Setup whitout Docker

#Setup API Laravel

**1. Clone or download the repository and enter its folder**
```
https://github.com/mellasystems/laravel-nuxt-docker.git
cd laravel-nuxt-docker

# cd server directory
$ cd server/

# install dependencies
$ composer install

# serve with hot reload at localhost:8000
$ php artisan serve

```

#Setup Frontend NuxtJS
``` bash
# cd nuxt directory
$ cd .. & cd nuxt/

# install dependencies
$ npm run install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start

# generate static project
$ npm run generate
```
For detailed explanation on how things work, check out [Nuxt.js docs](https://nuxtjs.org).