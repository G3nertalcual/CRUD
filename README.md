# Proyecto CRUD - Sistema de Evaluación

Este proyecto consiste en un sistema CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar y evaluar alumnos en función de varias categorías de evaluación. Los usuarios pueden agregar, visualizar, modificar y eliminar registros de estudiantes, así como ver sus calificaciones en áreas como trabajo en equipo, responsabilidad, creatividad, comunicación y esfuerzo.

## Tecnologías utilizadas

- **PHP**: Lenguaje de programación del lado del servidor.
- **MySQL**: Base de datos para almacenar los registros de los estudiantes.
- **HTML/CSS**: Para la estructura y estilo de las páginas web.
- **JavaScript**: Para mensajes interactivos con el usuario.
  
## Estructura del Proyecto

El proyecto se compone de los siguientes archivos y carpetas:

- `index.php`: Página principal que muestra los registros de los estudiantes y permite realizar operaciones CRUD.
- `agregar.php`: Formulario para agregar un nuevo registro de alumno.
- `eliminar.php`: Funcionalidad para eliminar registros de alumnos.
- `conexion.php`: Archivo de conexión con la base de datos.
- `css/estilos.css`: Estilos comunes para las páginas.
- `css/estilos_index.css`: Estilos específicos para la página principal (`index.php`).

## Funcionalidades

### 1. **Agregar alumno**
El usuario puede agregar un nuevo alumno proporcionando su nombre, número de control y calificaciones en las siguientes áreas:
- Trabajo en equipo
- Responsabilidad
- Creatividad
- Comunicación
- Esfuerzo

El formulario de ingreso se encuentra en `agregar.php`.

### 2. **Mostrar alumnos**
En la página principal (`index.php`), se muestra una tabla con los registros de todos los estudiantes. Cada registro incluye las calificaciones en las áreas mencionadas.

### 3. **Eliminar alumno**
Desde la página principal, el usuario puede eliminar un alumno seleccionando el enlace de "Eliminar" correspondiente a cada registro.

### 4. **Validación**
Las calificaciones ingresadas en los formularios están validadas para asegurarse de que estén dentro del rango permitido (1 a 10).

## Instalación

Para instalar el proyecto en tu servidor local, sigue estos pasos:

1. Clona o descarga el repositorio en tu máquina local.
2. Asegúrate de tener un servidor web con PHP y MySQL instalado (como XAMPP, WAMP, LAMP, etc.).
3. Crea una base de datos en MySQL llamada `escuela`.
4. Ejecuta el siguiente script SQL para crear la tabla `alumnos`:

   ```sql
   CREATE TABLE alumnos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100),
       nocontrol VARCHAR(20),
       trabajo_equipo INT,
       responsabilidad INT,
       creatividad INT,
       comunicacion INT,
       esfuerzo INT
   );

## **Configuración de la conexión a la base de datos**

Para que el proyecto funcione correctamente, necesitas configurar la conexión a la base de datos en el archivo `conexion.php`. Abre el archivo y edita las siguientes variables con los valores de tu servidor de base de datos:

```php

$host = 'localhost'; // Dirección del servidor MySQL
$usuario = 'root'; // Nombre de usuario de la base de datos
$contrasena = ''; // Contraseña de la base de datos
$nombreBD = 'escuela'; // Nombre de la base de datos que creaste
```
## **Acceso**

Accede al proyecto a través de tu navegador web local, generalmente en `http://localhost/nombre-del-proyecto`.

## Notas
- Asegúrate de que el servidor esté ejecutándose y la base de datos esté correctamente configurada antes de interactuar con el sistema.
- Se utilizan alertas de JavaScript para mostrar si las acciones de agregar o eliminar se realizaron correctamente.

#### Contribuciones
Si deseas contribuir a este proyecto, por favor realiza un fork del repositorio y envía un pull request con tus cambios.

#### Licencia
Este proyecto está bajo la Licencia MIT.

---

Este programa es privado, ajeno a cualquier partido político. Queda prohibido el uso para fines distintos a los establecidos en el programa.
