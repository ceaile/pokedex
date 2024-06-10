<div class="pokemon-container" style="margin: 90px auto; width: 300px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
<form action="/signedin" method="post">

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password1" name="password1" style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>

    <label for="password">Repeat Password:</label><br>
    <!-- aqui debe haber una validacion de js que asegure que ambas contraseñas son iguales -->
    <input type="password" id="password2" name="password2" style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
    
    <input type="submit" value="Sign up" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
</form>
<p> Already have an account? <a href="/login">Log in here</a></p>
</div>