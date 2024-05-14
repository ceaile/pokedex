<form action="/signedin" method="post">

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password1" name="password1"><br>

    <label for="password">Repeat Password:</label><br>
    <!-- aqui debe haber una validacion de js que asegure que ambas contraseñas son iguales -->
    <input type="password" id="password2" name="password2"><br>
    
    <input type="submit" value="Sign up">

</form>
<p> Already have an account? <a href="/login">Log in here</a></p>