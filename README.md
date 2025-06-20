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
5. **Detalle_venta**

---

### 🔗 Relaciones entre Tablas

- Un **cliente** puede tener muchas **ventas**.  
- Un **producto** pertenece a un **proveeodr**.  
- Un **proveedor** tiene muchos **productos**.  
- Un **producto** tiene muchos **detalles de ventas**.
- Un **detalle de venta** pertenece a una **venta**.  

---

## 🛠️ Paso a Paso del Desarrollo

### 1. Crear Proyecto Laravel

```bash
composer create-project laravel/laravel MiniDrogueria
cd MiniDrogueria
```

---

### 2. Configurar `.env`

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minidrogueria
DB_USERNAME=root
DB_PASSWORD=tu_clave
```

---

### 3. Crear Migraciones y Modelos

```bash
php artisan make:model Cleintes -m
php artisan make:model productos -m
php artisan make:model ventas -m
php artisan make:model detalle_venta -m
php artisan make:model proveedor -m
```

---

### 4. Ejecutar Migraciones

```bash
php artisan migrate
```

---

### 5. Crear Controladores REST

```bash
php artisan make:controller ClienteController --api
php artisan make:controller proveedorController --api
php artisan make:controller ProductoController --api
php artisan make:controller VentaController --api
php artisan make:controller DetalleVentaController --api
```

---

### 6. Definir Rutas en `routes/api.php`

```php
Route::apiResource('clientes', UsuarioController::class);
Route::apiResource('proveedores', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('ventas', PedidoController::class);
Route::apiResource('detalle_ventas', DetallePedidoController::class);
```

## Clonación del proyecto 
```bash
git clone https://github.com/dmeloH/MiniDrogueria.git
cd MiniDrogueria
composer install
php artisan serve 
php rourer list 
```
## Documentacion 

Para generar la documentación de la API, se utilizó el paquete **Laravel Scramble**. Asegúrate de tenerlo instalado y configurado correctamente.
- Redirija en el navegador a la ruta **http://localhost/docs/api**