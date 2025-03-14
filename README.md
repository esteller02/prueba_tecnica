NOTA: No utilicé Laravel Breeze como starter kit debido a que este usa tailwind para sus estilos y no tengo experiencia maquetando con dicha tecnología. Sin embargo, utilicé otro starter kit llamado Laravel UI el cual tambien ofrece un sistema de autenticación. A diferencia de Laravel Breeze, Laravel UI usa bootstrap para sus estilos, la cual es una tecnología con la que si tengo experiencia maquetando.



1) Crear una base de datos llamada 'concesionario'


2) Copiar el archivo.env.example y crear un archivo llamado .env y pegar en este todo lo que contiene el archivo.env.example. Luego, editar en el archivo .env las siguientes variables

DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT= //Escribe aquí el puerto donde corre tu base de datos (creo que en pgsql el puerto por defecto es 5432)

DB_DATABASE=concesionario

DB_USERNAME=  //Escribe aquí tu usuario

DB_PASSWORD= //Escribe aquí tu contraseña

3) Dentro de la carpeta del proyecto debes ejecutar los siguientes comandos uno por uno


composer install

npm install

php artisan key:generate

php artisan migrate

php artisan db:seed

npm run dev

php artisan serve

5) Luego de ejecutar el comando "php artisan serve" se te otorgará una ruta en la cual esta corriendo un servidor local, debes ingresar a dicha ruta.
En mi caso mi ruta fue: http://127.0.0.1:8000, copia y pega la ruta en tu navegador web.

6) Serás redireccionado al login, por lo que puedes ingresar con algunas de estas credenciales


    email: esteller03@gmail.com

    password: 12345678



    email: inactivo@gmail.com

    password: 12345678

 Nota: este ultimo usuario esta registrado con su campo 'activo' con un valor false. Al iniciar seión con este usuario solo tendrás acceso a la pantalla de inicio ya que todas las rutas de gestión de carros estan protegidas con un middleware personalizado que verifica si el usuario que esta intentando acceder a una de esas rutas posee un valor en su campo 'activo' igual a true.
        

7) Si lo deseas tambien podrías registrarte como un nuevo usuario (Todos los usuarios que se registren mediante el formulario de registro tendran por defecto su campo 'activo' igual a true)






