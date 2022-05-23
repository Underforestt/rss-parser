build:
	cd docker; \
	docker-compose build

up:
	cd docker; \
	docker-compose up -d; \
	docker-compose exec app composer install; \
    docker-compose exec app php artisan migrate:refresh; \
    docker-compose exec app php artisan cache:clear; \
    docker-compose exec app php artisan view:clear; \
    docker-compose exec app php artisan config:clear; \
    docker-compose exec app php artisan schedule:work

down:
	cd docker; \
	docker-compose stop

parse:
	cd docker; \
	docker-compose exec app php artisan parse https://lifehacker.com/rss

schedule:
