up:
	docker-compose up -d

build:
	docker-compose up -d --build

destroy:
	docker-compose down

shell:
	docker-compose exec app bash

install:
	docker-compose exec app composer install

db:
	docker-compose exec app php bin/console d:m:m -n
