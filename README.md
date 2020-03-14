# REST-API-LARAVEL-VUEJS-Test
### T1T0


[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Este proyecto muesta como realizar una SPA (Single Page Application) con ayuda de Laravel 5.8 y VUEjs

  - BACK END Laravel 5.8
  - FRONT END VUE JS
  - Apache

# New Features!

  - Naaa, no tiene nada de magico, espero sirva dereferencia para quien le haga falta


Importante:
  - No manejo las mejores practicas de Laravel pero se hace lo que se puede de la manera mas profecional
  - No manejo las mejores practicas de VUE JS pero se hace lo que se puede de la manera mas profecional
  - Disfrutalo
  - Si falla mandame un correo a islas333@gmail.com


### Tech

Utilizo una seria de proyectos de codigo abierto para hacer jalar esta madrola:

* [Laravel 5.8.17 ] - BACK END Fortachon
* [VUE JS ] - FRONT END Fortachon
* [note 10.15.3] - El mero mero de JS
* [npm 6.4.1] - Para instalar algunas dependencia para vuejs.
* [bootstrap-vue] - Para darle un poquito mas de presentacion (La documentacion es la muerte) :(
* [PHP 7.2] - Para hacer jalr Laravel
* [Apache] - Realmente creo no lo use
* [MySQL] - Para almacenar y alojar las DBs y Tablas
* [jQuery] - Para hacer unas madres que no logre hacer en VUEjs :(

Creo que fue todo, espero no se me olvide nada


### Installation

Ahora si viene lo bueno.

## Crear una base de datos en MySQL
Recuerda cambiar las credenciales de tu coneccion a MySQL en laravel en el archivo en raiz
.env

Para hacer funcionar este proyectito desde tu terminar si usas Linux (Apoco existe otro ambiente de desarrollo).

```sh
$ cd REST-API-LARAVEL-VUEJS-Test
$ php artisan Serve
$ php artisan migrate:refresh
$ php artisan db:seed
```

Abre el navegador de tu preferencia y entra a la direccion
http://127.0.0.1:8000/



### Extras

Aqui te explico un poco de que hacen los comandos anteriores

| Comando | Que pex con esto, que hace? |
| ------ | ------ |
| cd REST-API-LARAVEL-VUEJS-Test | Nos ubica en la carpeta donde esta el proyecto |
| php artisan Serve | Levante el servicio en el puerto 8000 de tu localhost |
| php artisan migrate:refresh | Crea las tablas necesarias para que sirva el servicio REST |
| php artisan db:seed | Crea algunos datos para que puedas verlo en accion IMPORTANTE son 10Mil registros, eso va a tardar un rato |

### Comando de regalo

| Comando | Que pex con esto, que hace? |
| ------ | ------ |
| php artisan route:list | Te permite ver la lista de rutas de los servicio REST |

| Method | URI | Name | Action | Middleware |
| ------ | ------ | ------ | ------ | ------ |
| GET-HEAD  | /                           |                  | Illuminate\Routing\ViewController              | web        |
| GET-HEAD  | api/estados                 | estados.index    | App\Http\Controllers\EstadoController@index    | api        |
| POST      | api/estados                 | estados.store    | App\Http\Controllers\EstadoController@store    | api        |
| GET-HEAD  | api/estados/create          | estados.create   | App\Http\Controllers\EstadoController@create   | api        |
| GET-HEAD  | api/estados/{estado}        | estados.show     | App\Http\Controllers\EstadoController@show     | api        |
| PUT-PATCH | api/estados/{estado}        | estados.update   | App\Http\Controllers\EstadoController@update   | api        |
| DELETE    | api/estados/{estado}        | estados.destroy  | App\Http\Controllers\EstadoController@destroy  | api        |
| GET-HEAD  | api/estados/{estado}/edit   | estados.edit     | App\Http\Controllers\EstadoController@edit     | api        |
| GET-HEAD  | api/personas                | personas.index   | App\Http\Controllers\PersonaController@index   | api        |
| POST      | api/personas                | personas.store   | App\Http\Controllers\PersonaController@store   | api        |
| GET-HEAD  | api/personas/create         | personas.create  | App\Http\Controllers\PersonaController@create  | api        |
| GET-HEAD  | api/personas/{persona}      | personas.show    | App\Http\Controllers\PersonaController@show    | api        |
| PUT-PATCH | api/personas/{persona}      | personas.update  | App\Http\Controllers\PersonaController@update  | api        |
| DELETE    | api/personas/{persona}      | personas.destroy | App\Http\Controllers\PersonaController@destroy | api        |
| GET-HEAD  | api/personas/{persona}/edit | personas.edit    | App\Http\Controllers\PersonaController@edit    | api        |


### Datos tecnico para que no te quibres la cabeza

Si te interesa saber como se crearon las Tablas y como se llenan aqui te dejo las rutas de los archivos creados con artisan de laravel


Los archivos que contiene la creacion para las tablas:
```sh
 database/migrations/2020_03_12_023516_estados.php
 database/migrations/2020_03_12_030416_personas.php
```

IMPORTANTE: Para realizar correctamente la foreingkey es indisplensable crear primero la tabla estados, el comando php artisan migrate:refresh ya ya realiza todo automatico

El archivo que contiene las semillas para llenar las tablas:
```sh
 database/seeds/Estados.php
```
IMPORTANTE: Este proceso puede llevar un rato, ya que son 10Mil registros

(optional) Third:
```sh
$ karma test
```
#### Ya para terminar
// Toda la logica esta en un solo archivo VUE
    resources/js/components/ExampleComponent.vue

// La vista contenedor esta en:
    resources/views/tabla.blade.php

// Los servicio REST esta disponible en 
    app/Http/Controllers/PersonaController.php
    app/Http/Controllers/EstadoController.php


License
----

GNU General Public License v3.0

Humberto Islas Ramirez
Gracias



