## Configure

Hopefully setup should be simple. I used local development environment.

- PHP 8
- Laravel 9

### Configure database in .env

```dotenv
{
  ...
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=npi-registry
    DB_USERNAME=
    DB_PASSWORD=
    ...
}
```
### Install Composer packages
```shell
composer install
```

### Install Javascript packages
```shell
npm install
```

### Migrate and Seed the database
```shell
php artisan migrate --seed
```

### Serve the local server
```shell
npm run dev
php artisan serve
```

## Basic Usage

Navigate to http://localhost:8000

Login with credentials:
```text
 username: admin
 password: password
```

## Testing

There is no PHPUnit or Pest tests implemented

