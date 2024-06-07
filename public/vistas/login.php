<!-- form temporal sin estilos ni nada 
tengo que ver como implementar la estructura_main (antiguo layout)
y si hay que modificar el index.php y alguna cosa mas
-->
<div class="pokemon-container" style="opacity: 0;">

    <form method="POST" action="/loggedin"> <!-- va en el index -->
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Log In">
    </form>
    <p> Don't have an account? <a href="/signup">Register here</a></p>
</div>