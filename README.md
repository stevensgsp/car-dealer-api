
# Test

_Laravel project._

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Requirements

This is a Laravel 6.x project, so you must meet its requirements.

### Installing

Clone the project

```bash
git clone https://gitlab.com/stevensgsp/car-dealer-api.git
cd car-dealer-api
composer install
cp .env.example .env
php artisan key:generate
```

Edit .env and put credentials, indicate environment, url and other settings.

Run migrations and seeders

```bash
php artisan migrate
php artisan db:seed
```
