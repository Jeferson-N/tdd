# TDD

### Laravel + Pest

## Installing dependencies

If you already have PHP and Composer installed, you may install the Laravel installer via Composer:

```bash
composer install
```

If you don't have PHP and Composer installed on your local machine, follow the Laravel documentation for installation, [documentation](https://laravel.com/docs/12.x/installation).

## Starting application

copy file .env.example from .env

```bash
cp .env.example .env
```

Execute the artisan command to generate new key

```bash
php artisan key:generate
```

Now, just start artisan serve

```bash
php artisan serve
```

## Tests

```bash
php artisan test
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
