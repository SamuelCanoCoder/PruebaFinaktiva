PruebaFinaktiva

Este proyecto es una aplicación web desarrollada inicialmente con PHP y MySQL, proporcionando funcionalidades clave para la gestión de datos. Posteriormente, se creó una versión adicional en C# con ASP.NET Core y SQL Server como una implementación opcional.

Tecnologías utilizadas

Versión principal (PHP, MySQL y Ajax):

PHP - Lenguaje principal para la lógica de negocio.

MySQL - Base de datos utilizada.

Ajax - Manejo de eventos 

Postman - Para probar las solicitudes via API

HTML, CSS y JavaScript - Para la interfaz de usuario.

Implementación adicional (C# y ASP.NET Core):

ASP.NET Core - Para la creación de la API.

SQL Server - Base de datos alternativa.

Instalación y configuración

Para la versión en PHP y MySQL:

Clona este repositorio:

git clone https://github.com/SamuelCanoCoder/PruebaFinaktiva.git

Configura el servidor local (XAMPP, WAMP o similar).

Importa la base de datos desde el archivo database.sql en MySQL.

Configura la conexión en connection/connection.php.

Inicia el servidor y accede a http://localhost/PruebaFinaktiva.

Para probar los registros via API puede utilizar Postman y enviar los parametros como se ve en la imagen.

![image](https://github.com/user-attachments/assets/a3363edf-dcd2-414c-a303-50afc53f5adb)


Para la versión en C# y ASP.NET Core (opcional):

Asegúrese de tener .NET SDK instalado.

Configura la cadena de conexión en appsettings.json.

Ejecuta los comandos:

dotnet restore
dotnet run

Accede a la API en https://localhost:5001.

Uso

Usuarios pueden registrar, consultar y gestionar datos.

La versión PHP funciona directamente en un servidor Apache con MySQL.

Muchas Gracias 🚀🚀

