# Resort Atlántico · Rutas y control de acceso con middlewares (Laravel 13 + SQLite)

Plataforma de un resort digital con zonas públicas y privadas. Tres middlewares hacen de "porteros" y deciden quién puede entrar en cada sala según si ha iniciado sesión, su rol y su edad.

## Instalación

```bash
git clone https://github.com/Carlossaucedoo/resort-middlewares.git
cd resort-middlewares
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

## Usuarios de prueba

Los crea el seeder (`database/seeders/DatabaseSeeder.php`). La contraseña de todos es `password123`.

| Nombre         | Email             | Edad | Admin |
|----------------|-------------------|------|-------|
| Director       | admin@resort.com  | 40   | Sí    |
| Cliente adulto | adulto@resort.com | 25   | No    |
| Cliente menor  | menor@resort.com  | 15   | No    |

## Middlewares

| Middleware   | Comprueba                      | Si no se cumple                                                   |
|--------------|--------------------------------|-------------------------------------------------------------------|
| `CheckAuth`  | Que el usuario haya iniciado sesión | Redirige a `/login`                                          |
| `CheckAge`   | Que `age` sea 18 o más         | Redirige a `/panel` con "Acceso denegado: Debes ser mayor de edad" |
| `CheckAdmin` | Que `is_admin` sea `true`      | Error 403                                                         |

## Rutas

| URL         | Vista                 | Middlewares               |
|-------------|-----------------------|---------------------------|
| `/`         | `home`                | Libre                     |
| `/login`    | `login`               | Libre                     |
| `/register` | `register`            | Libre                     |
| `/panel`    | `panel-usuario`       | `CheckAuth`               |
| `/casino`   | `casino`              | `CheckAuth` + `CheckAge`  |
| `/admin`    | `panel-admin`         | `CheckAuth` + `CheckAdmin`|

## Quién entra en cada zona

| Usuario    | `/panel` | `/casino`              | `/admin` |
|------------|----------|------------------------|----------|
| Sin sesión | → login  | → login                | → login  |
| Menor      | Sí       | → panel con aviso      | 403      |
| Adulto     | Sí       | Sí                     | 403      |
| Director   | Sí       | Sí                     | Sí       |
