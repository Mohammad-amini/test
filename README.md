<p>This is a test laravel/bootstrap-css project developed by Erfan-VatanParasti for <a href="https://parsan.net" target="new">Parsan Co</a></p>
<p>Thanks a log</p>

<hr/>


```sh
git clone https://github.comMohammad-amini/test.git test
cd test
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```
Create an MySQL database.
In .env file modify database name, user and password.

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Ping CRM in your browser, and login with:

- **Username:** umonahan@example.com // or another user email in users table
- **Password:** 123456
