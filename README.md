<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Escuela sabática

Este es un proyecto basado en Laravel, con el backend de la administracioon de los registros de las clases de la escuela sabática. Aquí encontrarás los pasos necesarios para clonar el repositorio y configurar el proyecto localmente.

## Requisitos

-   PHP >= 7.x
-   Composer
-   MySQL

## Instalación

Sigue estos pasos para configurar el proyecto en tu máquina local:

1. Clona este repositorio ejecutando el siguiente comando en tu terminal:

    ```bash
    git clone https://github.com/JAOLMOS07/apiescuelasabatica.git
    ```

2. Accede al directorio del proyecto:

    ```bash
    cd apiescuelasabatica
    ```

3. Instala las dependencias del proyecto a través de Composer:

    ```bash
    composer install
    ```

4. Copia el archivo `.env.example` y créalo como `.env`:

    ```bash
    cp .env.example .env
    ```

5. Genera una nueva clave de aplicación:

    ```bash
    php artisan key:generate
    ```

6. Configura tu base de datos en el archivo `.env`. Ejemplo para MySQL:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=apiescuelasabatica
    DB_USERNAME=root
    DB_PASSWORD=1234
    ```

7. Ejecuta las migraciones para crear las tablas de la base de datos:

    ```bash
    php artisan migrate
    ```

8. Ejecuta los seeders para crear los datos base:

    ```bash
    php artisan db:seed --class=DatabaseSeeder
    ```

9. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

Ahora podrás acceder al proyecto en tu navegador visitando `http://localhost:8000`.
