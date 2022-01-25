# About

This repo contains everything you need to get started to run this Laravel application with Docker Composer

## Step 1: Copy files

Download the Git repo and make a .env file

```
$ git clone https://github.com/fanpero87/amisMinner.git
$ cd amisMinner
$ cp .env.example .env
```

## Step 2: Deploy APP using Docker Compose

Create containers (this may take a moment)

```
$ docker-compose up -d --build
```

The result should look like this

```
Recreating amis-minners-db ... done
Creating amis-minners-app  ... done
Creating amis-minners-nginx ... done
```

After the container has been setup, check the status

```
$ docker-compose ps
```

The result should look like this

```
 Name                     Command               State                                      Ports
------------------------------------------------------------------------------------------------------------------------------------------
amis-minners-app     docker-php-entrypoint php-fpm    Up      9000/tcp
amis-minners-db      docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp,:::3306->3306/tcp
amis-minners-nginx   /docker-entrypoint.sh ngin ...   Up      0.0.0.0:8143->443/tcp,:::8143->443/tcp, 0.0.0.0:8180->80/tcp,:::8180->80/tcp
```

## Step 3: Install Composer dependencies

Bash into your application container to run some Laravel Composer commands

```
$ docker-compose exec app bash
```

Once inside the container, install the composer dependencies, generate the app key and migrate all the tables

```
$ composer install
$ php artisan key:generate
$ php artisan migrate
```

## Step 4: Congrats

Your app should now be accessible under `http://server_IP:8180`

#### Chart Notes

To make Charts on Laravel, I used [Laravel Charts](https://charts.erik.cat)
