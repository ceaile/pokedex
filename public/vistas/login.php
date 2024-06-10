<div class="pokemon-container"
    style="margin: 90px auto; width: 300px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <!-- mensaje personalizado de bienvenida -->
    <?php if (isset($_SESSION['mensaje_bienvenida'])) { ?>
        <p><strong>Welcome!</strong></p>
        <p><strong><?= $_SESSION['mensaje_bienvenida'] ?></strong></p><br>
        <?php
        unset($_SESSION['mensaje_bienvenida']);
    } else { ?>
        <p><strong>Welcome back!</strong></p><br>
    <?php } ?>

    <!-- FORM -->
    <form method="POST" action="/loggedin">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"
            style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"
            style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"><br>
        <input type="submit" value="Log In"
            style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
    </form><!-- .FORM -->

    <!-- mensaje de error -->
    <?php if (isset($_SESSION['mensaje_login'])) { ?>
        <p style="color:red;"><?= $_SESSION['mensaje_login'] ?></p>
        <?php unset($_SESSION['mensaje_login']); ?>
    <?php } ?>
    <!-- link a registro -->
    <p style="margin-top: 10px;"> Don't have an account? </p>
    <p><strong><a href="/signup">Register here</a></strong></p>
</div>