# LaravelAdminArea


## Local deployment Mac/Linux


```bash
    $ cp .env.example .env
    $ cd docker
    $ sudo make init
    $ sudo make app-shell
    $ php artisan key:generate
    $ php artisan migrate:fresh --seed
```

http://127.0.0.1:8080/

## Local deployment Windows


```bash
    cp .env.example .env
    cd docker
    docker-compose build
    docker-compose up -d
    docker-compose exec php-fpm
    composer install
    php artisan key:generate
    php artisan migrate:fresh --seed
```

http://127.0.0.1:8080/
