# Evaluación Laravel PHP
Este proyecto es una evaluación técnica usando Laravel 11.

# Requisitos previos
1. Instalar composer en su última versión en el entorno local.
2. Instalar node js en su última versión en el entorno local.
3. Tener un entorno local que cumpla con los siguientes requisitos: Apacha 2.4, PHP 8.3 con las extensiones curl, fileinfo, ftp, gd, gettext, imap, intl, ldap, mbstring, mysqli, openssl, pdomysql, pdo_pgsql, pgsql, sodium, sqlite3, xsl y zip.
4. Instalar y configurar PostgreSQL en su última versión en el entorno local.

## Instalación
1. Clona el repositorio https://github.com/jorgegomezxalapa/php-laravel-11.git y descarga la rama develop.
2. Dirígete a la carpeta del proyecto, por ejemplo C:\laragon\www\evaluacion-tenica-php
3. Crea un archivo .env en la raíz del proyecto, la información de dicho archivo la puedes clonar del archivo `.env.example`.
4. Abre la consola en la carpeta del proyecto, y ejecuta el comando `composer install`.
5. En base de datos postgresql, crear una base de datos llamada `laravel` y el usuario `postgres`.
6. Abre la consola en la carpeta del proyecto, y ejecuta el comando `php artisan migrate`.
7. Abre la consola en la carpeta del proyecto, y ejecuta el comando `php artisan db:seed --class=AdminSeeder`.
8. Abre la consola en la carpeta del proyecto, y ejecuta el comando `npm install`.

## Uso

Ejecuta `php artisan serve` para iniciar el servidor local.
Ejecuta `npm run dev` para compilar los assets del proyecto en el servidor local.
Inicia sesión con las credenciales admin@example.com y contraseña admin12345