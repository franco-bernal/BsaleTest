# Bsale Test

### Este es el backend del proyecto BsaleFront
* en este readme encontrará como instalar la aplicación.



### 1. Set up your environment
* Duplique el archivo **.env.example** dentro de la misma ubicación y renombrelo a **.env**.
* Para instalar las dependencias debe usar composer:
```bash
composer install
```
* Luego generar una nuev APP_KEY en el archivo **.env** corriendo este comando (en la carpeta del proyecto, como el siguiente):
```bash
# the key generated will be stored into APP_KEY variable on your .env file
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

/category  → devuelve todas las categorías
/product   → devuelve todos los productos
/bycategory/{name}/{category}/{orden}  → devuelve datos filtrados
