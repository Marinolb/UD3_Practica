# Gestión de Proyectos

## Descripción del Problema

Este proyecto tiene como objetivo desarrollar una plataforma para gestionar proyectos dentro de una empresa de desarrollo de software. La aplicación permitirá crear y gestionar **proyectos**, **tareas**, **empleados**, 
**clientes** y **comentarios**,  con funcionalidades para asignar tareas a empleados, definir prioridades y registrar avances.

Cada proyecto estará asociado a un cliente, y las tareas estarán vinculadas a los proyectos. Las tareas tendrán niveles de prioridad definidos, y los empleados podrán ser asignados a tareas específicas y colaborar dejando comentarios sobre su progreso.

El sistema permitirá visualizar de manera clara las fechas de inicio y fin de los proyectos, el presupuesto, el progreso de las tareas, y las relaciones entre ellas, con el objetivo de mejorar la planificación y ejecución de proyectos


## Modelo E-R

![Modelo E-R](/ER.jpg)


### Explicación de la Estructura del Proyecto

Este proyecto se basa en **Laravel** para la gestión del backend y **MariaDB** para la base de datos. A continuación, se describen los componentes clave:

1. **Modelos**: Representan las tablas de la base de datos. Cada modelo está asociado a una tabla y define las relaciones entre ellas. Utilizamos Eloquent ORM para simplificar la gestión de datos y las operaciones CRUD.
   
2. **Migraciones**: Se crearon migraciones para definir la estructura de las tablas y sus relaciones, utilizando claves primarias y foráneas para garantizar la integridad de los datos.

**Las migraciones deben ejecutarse en un orden específico debido a las relaciones entre las tablas. Para asegurar el orden correcto, se han utilizado prefijos numéricos que determinan el orden de ejecución.** Por ejemplo, la tabla **clientes** debe crearse antes que la tabla **proyectos**, ya que esta última depende de la primera a través de una clave foránea. Si no se sigue este orden, las migraciones pueden fallar debido a la falta de tablas de referencia. El orden correcto de las migraciones es el siguiente:

- **Clientes**: Información de los clientes asociados a los proyectos.
- **Empleados**: Datos de los empleados involucrados en los proyectos.
- **Prioridades**: Define los niveles de prioridad de las tareas.
- **Proyectos**: Datos de los proyectos, incluyendo nombre, descripción, fechas, presupuesto y cliente asociado.
- **Tareas**: Información sobre las tareas dentro de cada proyecto.
- **Comentarios**: Registro de comentarios realizados sobre las tareas.
- **Empleado_Tarea**: Tabla intermedia para gestionar la relación muchos a muchos entre empleados y tareas.


3. **Seeders**: Se crearon seeders para poblar las tablas con datos de prueba. Estos seeders facilitan la gestión y las pruebas de la aplicación.

4. **Rutas API**: A través del archivo `api.php`, se definieron rutas para implementar las operaciones CRUD para todas las tablas, lo que permite interactuar con los datos mediante solicitudes HTTP (GET, POST, PUT, DELETE).


### Validaciones (Bajo Revision)

Se implementaron validaciones para los métodos `POST` y `PUT` a través de la creación de un `GeneralRequest`, que valida los parámetros de entrada para garantizar que se cumplan los 
requisitos establecidos en los modelos (por ejemplo, que los campos no estén vacíos y que los valores sean del tipo adecuado).


## Way of Working (WoW)

### Requisitos Tecnológicos

Para trabajar con este proyecto, es necesario tener instalados:

- **Docker**: Para gestionar los contenedores.
- **Docker Compose**: Para facilitar la orquestación de múltiples contenedores.

### Pasos para poner en marcha el proyecto

### 1. Clonar el repositorio

Primero, clona el repositorio de GitHub en tu máquina local:

```bash
git clone https://github.com/marinolb/UD3_Practica.git  
``` 

### 2. Configuraciones Previas

El archivo `docker-compose.yml` ya está correctamente configurado y se encuentra en la raíz del proyecto. Dentro de **`laravel > laravel-project`** encontrarás el archivo **`.env`** donde se configura 
MariaDB. La base de datos por defecto será **`IGFORMACION`**. Además, se especifican el puerto y las credenciales de la base de datos:


```bash
DB_CONNECTION=mariadb  
DB_HOST=mariadb  
DB_PORT=3306  
DB_DATABASE=IGFORMACION
DB_USERNAME=root  
DB_PASSWORD=safepass123
```

### 3. Levantar los contenedores con Docker Compose

Ejecuta el siguiente comando para levantar tanto la base de datos como la aplicación Laravel en contenedores (asegurate de estar en el directorio UD3_Practica) :

```bash
docker-compose up --build
```

Esto iniciará los contenedores según la configuración en `docker-compose.yml`. La base de datos se levantará en un contenedor de **MariaDB**, y la aplicación Laravel en otro contenedor.

### 4. Realizar migraciones y cargar datos de prueba

Tanto las migraciones como los seeds se han ejecutado previamente para crear las tablas y datos de prueba necesarios en la base de datos. Si necesitas volver a realizar las migraciones por alguna razón (por ejemplo, 
si realizaste cambios en las migraciones o la base de datos), puedes ejecutar el siguiente comando:

```bash
docker exec -it laravel bash  
php artisan migrate:fresh
php artisan db:seed
```


### 5. Para acceder a MariaDB

Si necesitas acceder directamente a la base de datos MariaDB desde el contenedor, puedes usar el siguiente comando:

```bash
docker exec -it mariadb-server mariadb -u root -p
```

Y la contraseña, como aparece más arriba en el archivo `.env`:

```bash
safepass123
```

### Extra - Realizar pruebas con Postman

Se adjunta una colección de Postman en la carpeta raiz del proyecto para facilitar las pruebas de la API. Esta colección incluye ejemplos de todas las operaciones CRUD (GET, POST, PUT, DELETE) para cada una de las entidades del sistema. 

Algunos ejemplos de endpoints incluidos en la colección son:

- **Crear un nuevo proyecto**  
  Método: `POST`  
  Endpoint: `/api/proyectos`  

- **Obtener todos los empleados**  
  Método: `GET`  
  Endpoint: `/api/empleados`  

- **Actualizar una tarea**  
  Método: `PUT`  
  Endpoint: `/api/tareas/{id}`  

- **Eliminar un comentario**  
  Método: `DELETE`  
  Endpoint: `/api/comentarios/{id}`  
