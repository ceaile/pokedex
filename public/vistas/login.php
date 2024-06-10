<!-- form temporal sin estilos ni nada 
tengo que ver como implementar la estructura_main (antiguo layout)
y si hay que modificar el index.php y alguna cosa mas
-->
<div class="pokemon-container" style="margin: 90px auto; width: 300px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <form method="POST" action="/loggedin"> <!-- va en el index -->
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
        <input type="submit" value="Log In" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    <p style="margin-top: 10px;"> Don't have an account? <a href="/signup">Register here</a></p>
</div>