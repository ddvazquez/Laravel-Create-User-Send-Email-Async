##  Crear un usuario y enviar email de forma asincrona

- Hexagonal Architecture
- DDD
- Repository Pattern
- Dependency Injection
- Asynchronous Mysql Event Bus
- Event-Driven Architecture
- Uuid generation on client side

## Instrucciones de instalación
- Clona el repo en tu pc.
- Crea una base de datos para el proyecto.
- Crea el archivo .env en la raíz del proyecto y rellena los datos de tu base de datos para poder ejecutar las migraciones y del servidor de correo.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

- Ejecuta los siguientes comandos en la raíz del proyecto:
    - composer install
    - php artisan key:generate
    - php artisan migrate --seed

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

