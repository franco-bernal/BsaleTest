# Bsale Test

### Proyectos de postulación
* en este readme encontrará como instalar la aplicación.

### Objetivo

* Determinar si el candidato está en condiciones de interactuar con una base de datos a través de una
aplicación web, implementando cliente y servidor.


### 1. Clone el repositorio y luego dirijase al proyecto BsaleTestBackend para la instalación

```bash
git clone https://github.com/OCarvajalMora/laravel-mau.git
```



### 2. Set up your environment
* Duplique el archivo **.env.example** dentro de la misma ubicación y renombrelo a **.env**.
* Para instalar las dependencias debe usar composer:
```bash
composer install
```
* Luego generar una nuev APP_KEY en el archivo **.env** corriendo este comando (en la carpeta del proyecto, como el siguiente):
```bash
php artisan key:generate
```

* En caso de cualquier inconveniente, puede utilizar estos comandos:

```bash
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan optimize
```


##### Esta aplicación actualmente disponibiliza las siguientes url para consumir

* /category  → devuelve todas las categorías
* /product   → devuelve todos los productos
* /bycategory/{name}/{category}/{orden}  → devuelve datos filtrados
