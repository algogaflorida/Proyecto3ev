# 📺 Gestión de Series - Proyecto 3ª Evaluación

Este proyecto es una aplicación web desarrollada en **PHP** siguiendo el patrón de diseño **MVC (Modelo-Vista-Controlador)**. Permite gestionar un catálogo de series con diferentes categorías mediante el uso de **Polimorfismo** y persistencia en base de datos con **PDO**.

## 🚀 Características

*   **Autenticación**: Sistema de login y registro de usuarios con gestión de sesiones.
*   **Polimorfismo**: Implementación de clases heredadas (`Drama`, `Documental`, `Animada`) desde una clase base `Serie`.
*   **CRUD Completo**: Crear, listar, editar y eliminar series.
*   **Sistema de Votación**: Posibilidad de calificar series con actualización dinámica de colores en la tabla según la nota (Semáforo).
*   **Diseño Responsive**: Interfaz limpia utilizando CSS manual sin dependencias externas pesadas.

## 🛠️ Requisitos e Instalación

1.  **Servidor**: XAMPP, WAMP o cualquier entorno con PHP 8.x y MySQL.
2.  **Base de Datos**: 
    *   Importar el archivo `serieScript.sql` incluido en la carpeta "bbdd".
    *   La base de datos se llama `serie`.
3.  **Configuración**:
    *   Revisar el archivo `conf.json` para asegurar que las credenciales de la base de datos (host, user, password) coinciden con tu entorno local.

## 📂 Estructura del Proyecto

*   `/controllers`: Lógica de control para Series y Usuarios.
*   `/models`: Clases de objeto (`Serie`, `Drama`, etc.) y Gestores de datos (PDO).
*   `/views`: Plantillas HTML/PHP para la interfaz de usuario.
*   `index.php`: Punto de entrada único de la aplicación (Front Controller).
*   `autoload.php`: Carga automática de clases.
*   
---

**Desarrollado para el módulo de Programación de 1º de DAW en Florida Universitària - 2026**
