<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

# Proyecto Desafío 1

Este es un proyecto Laravel 10 que utiliza Inertia.js como stack de presentación y Vue.js para la construcción de interfaces de usuario.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- PHP (versión >= 8.0)
- Composer
- Node.js (versión >= 14)
- NPM o Yarn
- Laravel 10
- Vue.js 3
- Inertia.js
## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. Clona este repositorio en tu máquina local:

```bash
https://github.com/Gosnejose/desafioAntonioLuquin.git
```
Accede al directorio del proyecto:
```bash
cd desafio1
```
Instala las dependencias de PHP utilizando Composer:
```bash
composer install

```
Instala las dependencias de Node.js utilizando NPM o Yarn:
```bash
npm install
# O
yarn install

```
Crea un archivo de configuración .env basado en .env.example:
```bash
cp .env.example .env

```
Ejecuta las migraciones de la base de datos para crear las tablas:

```bash
php artisan migrate

```
Si deseas, puedes ejecutar los seeders para llenar la base de datos con datos de prueba:
```bash
php artisan db:seed

```
Compila los recursos de frontend (JavaScript, CSS, etc.):
```bash
npm run dev
# O
yarn dev

```
Inicia el servidor de desarrollo:
```bash
php artisan serve

```

Uso
Una vez que el servidor esté en funcionamiento, puedes acceder a tu aplicación en http://localhost:8000. ¡Disfruta de tu aplicación Laravel 10 con Inertia y Vue!

Contribuir
Si deseas contribuir a este proyecto, por favor abre un issue o una solicitud de extracción y estaremos encantados de revisarlo.

 ### Tablas

## Tabla Producto
- ID
- Nombre
- Descripcion
- Precio
- Stock

## Tabla Usuario
- Id
- Nombre
- Email
- Pasword

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
