# ARRANQUE:

Se necesita tener instalado PHP.
0. Clonar proyecto en 'htdocs' ( git clone https://github.com/ceaile/pokedex )
1. Abrir XAMPP, iniciar Apache y Mysql.
2. En phpmyadmin, importar .sql, es la estructura de bbdd vacía.
3. Por consola ir a la raiz principal del proyecto ( C:/xampp/htdocs/pokedex )
4. Hacer 'composer install' en la consola (necesitas vendor y guzzle, para la conexión a la PokeApi)
5. Entrar en la carpeta public/ ( cd public )
6. Lanzar el siguiente comando: "php -S localhost:8080" lo que levanta un servidor lanzando el archivo index.php de public, porque es la carpeta donde te encuentras. (Importante la S mayúscula)
7. Entras en el navegador y pruebas las URLs definidas en el index.php "localhost:8080", "localhost:8080/home" etc
8. Para detener el servidor pulsar en la consola ctrol+C

Extra: De darse errores, comprobar que la caché esté vacía. Si se clonaron varios proyectos y se abrieron en el mismo puerto, probar en otro porque a veces aunque se borre caché y se cierre el otro proyecto, sigue cargando el primero (8081, 8082... por ejemplo)

## ARRANQUE XAMPP:
- No necesario -
1. Inicia Apache con la consola de Xampp
2. Accede a localhost/public
3. Si lo anterior no funciona accede con https: "https://localhost/public/"
4. Si quieres que te entre sin entrar en public quitale el .old al index.php.old que está en la raiz o saca el index.php de public quitandole un dirname() en la línea 4

