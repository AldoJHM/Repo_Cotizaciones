
# Proyecto Cotizaciones

## 📌 Descripción
Aplicación web desarrollada en Laravel 11 con Vite para gestionar cotizaciones de productos.
Crear un sistema web donde se pueda:
•	Capturar los datos del cliente y del producto.
•	Calcular automáticamente los costos y precios.
•	Generar cotizaciones en PDF.
•	Guardar y consultar cotizaciones pasadas.
•	Agilizar el flujo de trabajo entre ventas, ingeniería y producción.

## 🛠️ Tecnologías
- Laravel 11
- Vite
- PHP 8.2
- Node.js
- MySQL

## 🚀 Instalación
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev