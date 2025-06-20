# 📦 API REST - Sistema de Gestión de Farmacia

Este proyecto fue desarrollado como parte del plan de mejoramiento del programa _Tecnólogo en Análisis y Desarrollo de Software_ del SENA. El objetivo es demostrar habilidades en el desarrollo backend utilizando Laravel y aplicar buenas prácticas en la creación de APIs RESTful.

---

## 👤 Información del Aprendiz

- _Nombre:_ Heady Daniela Melo Gordillo
- _Cédula:_ 1018434287
- _Ficha de formación:_ 2848170
- _Centro de formación:_ Centro Industrial de Mantenimiento y Manufactura – Duitama

---

## 🎯 Objetivo del Proyecto

Desarrollar una API funcional desde cero utilizando el framework Laravel, que permita gestionar un sistema con entidades relacionadas, cumpliendo los siguientes criterios:

- Mínimo cinco tablas con relaciones foráneas.
- Creación de migraciones, modelos, controladores y rutas.
- Pruebas funcionales mediante Postman.
- Documentación técnica clara y estructurada.

---

## 🧰 Tecnologías Utilizadas

- Laravel 10.x
- PHP 8.x
- MySQL
- Composer
- Postman

---

## 🧱 Estructura de la Base de Datos

Se diseñaron cinco entidades con sus respectivas relaciones:

1. _Empleados_
2. _Productos_
3. _Clientes_
4. _Ventas_
5. _Detalle_venta_

---

### 🔗 Relaciones entre Tablas

- Un _cliente_ puede tener muchas _ventas_.
- Un _producto_ pertenece a un _proveedor_.
- Un _proveedor_ tiene muchos _productos_.
- Un _producto_ tiene muchos _detalles de ventas_.
- Un _detalle de venta_ pertenece a una _venta_.

---

## 🛠️ Paso a Paso del Desarrollo

### 1. Crear Proyecto Laravel

```bash
composer create-project laravel/laravel api-mejoramiento
cd api-mejoramiento
php artisan install api
```

---

### 2.Instalacion de jwt

```bash
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```

---

### 3. Configurar `.env`

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_mejoramiento
DB_USERNAME=root
DB_PASSWORD=tu_clave
```

---

### 4. Crear Migraciones y Modelos

```bash
php artisan make:model Cleintes -m
php artisan make:model productos -m
php artisan make:model ventas -m
php artisan make:model detalle_venta -m
php artisan make:model proveedor -m
```

---

### 5. Ejecutar Migraciones

```bash
php artisan migrate

```

---

### 6. Crear Controladores REST

```bash
php artisan make:controller ClienteController --api
php artisan make:controller proveedorController --api
php artisan make:controller ProductoController --api
php artisan make:controller VentaController --api
php artisan make:controller DetalleVentaController --api
```

---

### 7. Definir Rutas en routes/api.php

```php
Route::apiResource('clientes', UsuarioController::class);
Route::apiResource('proveedores', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('ventas', PedidoController::class);
Route::apiResource('detalle_ventas', DetallePedidoController::class);
```

### 8. Documentacion con scramble

```bash
composer require dedoc/scramble
php artisan vendor:publish --provider="Dedoc\Scramble\ScrambleServiceProvider" --tag="scramble-config"
```

## Clonación del proyecto

bash
git clone https://github.com/dmeloH/MiniDrogueria.git
cd MiniDrogueria
composer install
php artisan serve
php rourer list

## Documentacion

Para generar la documentación de la API, se utilizó el paquete _Laravel Scramble_. Asegúrate de tenerlo instalado y configurado correctamente.

- Redirija en el navegador a la ruta _http://localhost/docs/api_
