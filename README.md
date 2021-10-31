# API test project

### What is this project about

Make PHP API sever with one GET endpoint. Endpoint should have 2 parameters:

- `n` - integer in between 0 and 9999
- `lang` - 3-letter code of locale

Expected response would be string with `n` as words in `lang` locale.

### Installation

- `git clone git@github.com:vladislav-pone/api-test.git`
- `docker run --rm --interactive --tty --volume $PWD:/app composer composer install` to install composer packages 
- `docker compose up -d` run project for first time 
- `docker compose exec fpm php artisan key:generate` After first run set Laravel app key

### To start API server
- `docker compose up -d`

### To stop API server
- `docker compose down`

### Usage (via curl)
- `curl http://localhost/?n=100&lang=eng` should return `one hundred`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
