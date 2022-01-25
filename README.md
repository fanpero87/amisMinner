[Laravel Charts](https://charts.erik.cat)

```
composer require consoletvs/charts "7.*"
```

```
php artisan make:chart MinnersChart
```

Register chart on `App\Providers\AppServiceProvider`

# Deploy APP using Docker

$ git clone https://github.com/fanpero87/amisMinner.git
$ cd amisMinner
$ cp .env.example .env
$ docker-compose up -d --build
$ docker-compose ps

# Install Composer dependencies

$ docker-compose exec app bash

composer install
php artisan key:generate
