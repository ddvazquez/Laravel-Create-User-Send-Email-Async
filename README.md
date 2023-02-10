##  Crear un usuario u enviar email de forma asincrona

## Instrucciones de instalación
- Clona el repo en tu pc.
- Crea una base de datos para el proyecto.
- Crea el archivo .env en la raíz del proyecto y rellena los datos de tu base de datos para poder ejecutar las migraciones.
- Ejecuta los siguientes comandos en la raíz del proyecto:
    - composer install
    - php artisan key:generate
    - php artisan migrate --seed
    - npm install
    - npm run dev
    - php artisan serve (o usa tu servidor web preferido)

## Instrucciones de uso

### Crear un usuario

En esta implementación he optado por pasar los identificadores desde fuera

Ejemplo con CURL

```
curl --location --request PUT 'project_url/api/users/18038d36-e3b4-4334-b578-744661e42384?name=David&email=dvazsquez@simplifica.es&password=123123123'
```

siendo project_url el path de nuestro proyecto

### Consumir eventos (en este caso enviar correos a usuarios registrados)

```
php artisan  spfc:consume-domain-events:mysql 2
```

siendo 2 el numero de eventos a consumir

