# API test project

### What is this project about

Make PHP API sever with one GET endpoint. Endpoint should have 2 parameters:

- `n` - integer in between 0 and 9999
- `lang` - 3-letter code of locale

Expected response would be string with `n` as words in `lang` locale.

### Installation

- `git clone git@github.com:vladislav-pone/api-test.git`
- `docker compose up -d` run project for first time
- `docker compose exec fpm composer install` to install composer packages
- `docker compose exec fpm php artisan key:generate` After first run set Laravel app key

### To start API server
- `docker compose up -d`

### To stop API server
- `docker compose down`

### Usage (via curl)
- `curl http://localhost/\?n\=100\&lang\=eng` should return `one hundred`
- `curl http://localhost\?n\=49\&lang\=lat` should return `četrdesmit deviņi`

### Helpful commands
- `docker compose exec fpm bash` - log into php container
- `docker compose exec fpm composer install` - to quickly run composer

### How to test

`docker compose exec fpm php artisan test`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
