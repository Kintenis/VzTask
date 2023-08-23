# PHP backend task

## Project setup

- Run command ``docker-compose build`` on your terminal
- Run command ``docker-compose up -d`` on your terminal
- Run command ``chmod -R 777 storage`` on your terminal after went into php container on docker
- Run command ``composer install`` on your terminal after went into php container on docker
- Run command ``php artisan key:generate`` on your terminal after went into php container on docker
- Run command ``php artisan migrate`` on your terminal after went into php container on docker

## Data generation
- Run command ``php artisan app:import-products`` on your terminal after went into php container on docker to generate products
- Run command ``php artisan app:import-stocks`` on your terminal after went into php container on docker to generate stocks

## API
- GET endpoint listing all of the products ``http://localhost:8001/api/get-all-products``
