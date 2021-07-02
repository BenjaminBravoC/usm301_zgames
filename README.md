### Comandos de uso común

## Para desplegar con Docker
``
    docker-compose build
    docker-compose up -d
``

## Para desplegar con xampp importante que se respete la estructura y se guarde todo en htdocs

## Para crear un proyecto de cero
``
    composer create-project laravel/laravel nombreApp
``

## Para instalar (recien se descarga de GitHub, cuando el proyecto ya existe):
``
    composer install
``

## Para Laravel:

## Instalar Laravel
``
    composer create-project laravel/laravel nombreApp
``

## por si falla:
``
    chmod -R 777 nombreApp/storage
``

## Para crear controladores (dentro del contenedor):

``
    php artisan make:controller NombreController
``


## En los controladores metemos la logica de la aplicación (el acceso a base de datos, etc).

## Base de datos

## para actualizar la base de datos

``
    php artisan migrate
``

## Para crear una migracion de una tabla

``
    php artisan make:migration crear_tabla_consolas--create=consolas
``

## ir al archivo de migracion y agregar las definicion de las tablas
## zgames/database/migrations/crear_tabla_consolas

## y volver a la shell de laravel y poner
``
    php artisan migrate
``


## crear la clase php que administre la tabla (crear un modelo)
## un modelo es un archivo que permite efectuar operaciones con la base de datos
## importante siempre el nombre en singular
## juanitos para la tabla, juanito para el modelo
``
    php artisan make:model Nombre
``