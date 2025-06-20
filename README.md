# 📦 API REST - Sistema de Gestión de Farmacia

Este proyecto fue desarrollado como parte del plan de mejoramiento del programa **Tecnólogo en Análisis y Desarrollo de Software** del SENA. El objetivo es demostrar habilidades en el desarrollo backend utilizando Laravel y aplicar buenas prácticas en la creación de APIs RESTful.

---

## 👤 Información del Aprendiz

- **Nombre:** Heady Daniela Melo Gordillo
- **Cédula:** 1018434287
- **Ficha de formación:** 2848170
- **Centro de formación:** Centro Industrial de Mantenimiento y Manufactura – Duitama

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

1. **Empleados**
2. **Productos**
3. **Clientes**
4. **Ventas**
5. **Detalles del Pedido**

---

### 🔗 Relaciones entre Tablas

- Un **usuario** puede tener muchos **pedidos**.
- Un **producto** pertenece a una **categoría**.
- Un **pedido** tiene muchos **detalles del pedido**.
- Un **detalle del pedido** pertenece a un **producto** y a un **pedido**.

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
DB_DATABASE=mini_drogueria
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Crear Migraciones y Modelos

```bash
php artisan make:model Usuario -m
php artisan make:model Categoria -m
php artisan make:model Producto -m
php artisan make:model Pedido -m
php artisan make:model DetallePedido -m
```

---

### 5. Ejecutar Migraciones

```bash
php artisan migrate
```

---

### 6. Crear Controladores REST

```bash
php artisan make:controller UsuarioController --api
php artisan make:controller CategoriaController --api
php artisan make:controller ProductoController --api
php artisan make:controller PedidoController --api
php artisan make:controller DetallePedidoController --api
```

---

### 7. Definir Rutas en `routes/api.php`

```php
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('pedidos', PedidoController::class);
Route::apiResource('detalle-pedidos', DetallePedidoController::class);
```

## Clonación del proyecto

```bash
git clone [url]
cd nombre_del_proyecto
composer install
php artisan serve
php rourer list
```

## Documentdacion

- Redirija en el navegador a la ruta **http://localhost/docs/api**
