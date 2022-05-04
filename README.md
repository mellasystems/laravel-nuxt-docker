# nuxt-auth-with-laravel-sanctum-docker

My CRUD project built with [**Laravel**](https://laravel.com/) as server side language, [**NuxtJS**](https://nuxtjs.org/) and [**Boostrap5**](https://getbootstrap.com/) as frontend framework and [**PostgreSQL**](https://www.postgresql.org/) as database server.

## Features Implemented

1. CRUD Employee With Laravel API
- **Login and Register**
- **Create employees:**
- **Read all employees paginated:**
- **Read one employee:**
- **Update one employees**
- **Delete one employee**
2. Simple notifications for validation actions and [**toast**]()
3. Authentication using [**Laravel Sanctum**](https://laravel.com/docs/9.x/sanctum) and [**@nuxtjs/auth**](https://auth.nuxtjs.org/) module.

## Build Setup

**Install Prerequisites:**

- **[GIT](https://git-scm.com/downloads)**
- **[Docker](https://docs.docker.com/engine/install/)**
- **[Docker Compose](https://docs.docker.com/compose/install/)**

Check if `docker-compose` is already installed by entering the following command :

```bash
$ which docker-compose
```

Check Docker Compose compatibility :

[Compose file version 3 reference](https://docs.docker.com/compose/compose-file/)

The following is optional but makes life more enjoyable:

```bash
$ which make
```

On Ubuntu and Debian these are available in the meta-package build-essential. On other distributions, you may need to install the GNU C++ compiler separately.

```bash
$ sudo apt install build-essential
```

#Setup API Laravel

**1. Clone or download the repository and enter its folder**
```
$ git clone https://github.com/mellasystems/laravel-nuxt-docker.git

$ cd laravel-nuxt-docker

# copy the .env-example to .env on directory /server
$ cp server/.env.example server/.env

# run this command to build the imagen for the Laravel API
$ docker-compose build
$ docker-compose up -d

# generate key application
$ docker-compose exec api php artisan key:generate

# run the migrations
$ docker-compose exec api php artisan migrate --seed

```
***Ready the Laravel API***

#Setup Frontend NuxtJS
``` bash
# enter into nuxt directory
$ cd nuxt/

# install dependencies
$ npm install

# serve with hot reload at localhost:3000
$ npm run dev

# build for production and launch server
$ npm run build
$ npm run start

# generate static project
$ npm run generate
```
#Important!
After you have done the backend and frontend configuration, the user and password is : email: admin@admin.com and password: password.
For detailed explanation on how things work, check out [MellaSystems](https://mellasystems.com)