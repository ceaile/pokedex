<form action="/signedin" method="post">

    <label for="username">Nombre de usuario:</label><br>
    <input type="text" id="username" name="username"><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password1" name="password1"><br>

    <label for="password">Repite tu contraseña:</label><br>
    <!-- aqui debe haber una validacion de js que asegure que ambas contraseñas son iguales -->
    <input type="password" id="password2" name="password2"><br>
    
    <input type="submit" value="Submit">
</form>