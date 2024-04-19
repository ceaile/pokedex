# ARRANQUE:

Se necesita tener instalado PHP.

1. Por consola vas a la raiz principal del proyecto.
2. Entras en la carpeta public/.
3. Lanzas el siguiente comando: "php -S localhost:8080" lo que levanta un servidor lanzando el archivo index.php de public, porque es la carpeta donde te encuentras.
4. Entras en el navegador y pruebas las URLs definidas en el index.php "localhost:8080" o "localhost:8080/a"
5. Para detener el servidor pulsar en la consola ctrol+C

## ARRANQUE XAMPP:

1. Inicia Apache con la consola de Xampp
2. Accede a localhost/public
3. Si lo anterior no funciona accede con https: "https://localhost/public/"
4. Si quieres que te entre sin entrar en public quitale el .old al index.php.old que está en la raiz o saca el index.php de public quitandole un dirname() en la línea 4

