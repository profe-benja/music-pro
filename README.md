# Music pro
## Instalación

Este proyecto es una tienda de música en línea desarrollada con Laravel. Permite gestionar productos musicales, realizar compras y administrar el inventario.

## Requisitos

- [Laragon](https://laragon.org/): Herramienta de desarrollo local que incluye Apache, PHP y MySQL.

## Configuración

1. Clona el repositorio: abrir terminar de laragon y escribir los siguiente

```bash
git clone https://github.com/profe-benja/music-pro
```

2. Crea una base de datos en Laragon.

3. Copia el archivo `.env.example` y renómbralo como `.env`. Edita el archivo `.env` para configurar la conexión a la base de datos, el usuario por default es root y la contraseña es vacia:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_basedatos
DB_USERNAME=root
DB_PASSWORD=
```

4. Entra a la carpeta del repositorio:

```bash
cd music-pro
```

5. Instala las dependencias de Composer:

```bash
composer install
```

6. Ejecuta las migraciones y los seeders para crear y poblar la base de datos:

```bash
php artisan storage:link

php artisan migrate:fresh --seed
```

## Uso

- Inicia Laragon y asegúrate de que los servicios de Apache y MySQL estén activos.

- Accede a la URL del proyecto en tu navegador (por ejemplo, `http://localhost/music-pro`) para utilizar la tienda de música.

- Si es iniciado en laragon prueba con `http://music-pro.test`

## Contribución

Si deseas contribuir a este proyecto, puedes abrir un issue para reportar errores o sugerir mejoras. También puedes enviar pull requests con tus contribuciones.

## Licencia

Este proyecto está bajo la [Licencia MIT](LICENSE).
```

Recuerda reemplazar `tu_basedatos`, `tu_usuario` y `tu_contraseña` en el archivo `.env` con los valores correspondientes de tu configuración de base de datos.

Este README.md proporciona una descripción general del proyecto, los requisitos, los pasos de configuración, el uso, la contribución y la información de la licencia. Puedes personalizarlo según tus necesidades y agregar más detalles sobre tu proyecto si lo deseas.


# OTROS CODIGOS DEV 🎸
```bash
php artisan l5-swagger:generate
```

# TARJETAS PARA UTILIZAR 💳 

https://www.transbankdevelopers.cl/documentacion/como_empezar#tarjetas-de-prueba

| Tipo de tarjeta   | Número de tarjeta         | CVV  | Fecha de expiración  | Resultado                                |
|-------------------|---------------------------|------|----------------------|------------------------------------------|
| VISA              | 4051 8856 0044 6623       | 123  | Cualquier fecha       | Genera transacciones aprobadas           |
| AMEX              | 3700 0000 0002 032        | 1234 | Cualquier fecha       | Genera transacciones aprobadas           |
| MASTERCARD        | 5186 0595 5959 0568       | 123  | Cualquier fecha       | Genera transacciones rechazadas          |
| Redcompra         | 4051 8842 3993 7763       | N/A  | N/A                  | Genera transacciones aprobadas           |
| Redcompra         | 4511 3466 6003 7060       | N/A  | N/A                  | Genera transacciones aprobadas           |
| Redcompra         | 5186 0085 4123 3829       | N/A  | N/A                  | Genera transacciones rechazadas          |
| Prepago VISA      | 4051 8860 0005 6590       | 123  | Cualquier fecha       | Genera transacciones aprobadas           |
| Prepago MASTERCARD| 5186 1741 1062 9480       | 123  | Cualquier fecha       | Genera transacciones rechazadas          |

Cuando aparece un formulario de autenticación con RUT y clave, se debe usar el RUT *11.111.111-1* y la clave *123*

Recuerda que esta tabla contiene información de tarjetas de prueba para realizar transacciones en el ambiente de integración de Webpay. Asegúrate de utilizar esta información solo en dicho entorno y no con tarjetas reales para evitar cualquier problema de seguridad o fraude.
