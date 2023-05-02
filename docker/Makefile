init: build up composer-install storage-chmod storage-link

restart: down up

up:
	docker-compose up -d

stop:
	docker-compose stop

	docker-compose down

build:
	docker-compose build

reset-env:
	cp ../.env.example ../.env

composer-install:
	docker-compose exec php-fpm composer install

app-key:
	docker-compose exec php-fpm php artisan key:generate

app-shell:
	docker compose exec php-fpm bash

storage-chmod:
	chmod -R 777 ../storage

storage-link:
    docker-compose exec php-fpm php artisan storage:link

db-fresh:
	docker-compose exec php-fpm php artisan migrate:fresh --seed
