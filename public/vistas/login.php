<div class="pokemon-container pokemon-container-login">
    <!-- FORM -->
    <form method="POST" action="/loggedin" class="form-login">
        <!-- mensaje personalizado de bienvenida -->
        <?php if (isset($_SESSION['mensaje_bienvenida'])) { ?>
            <p><strong>Welcome!</strong></p>
            <p><strong><?= $_SESSION['mensaje_bienvenida'] ?></strong></p><br>
            <?php
            unset($_SESSION['mensaje_bienvenida']);
        } else { ?>
            <p><strong>Welcome back!</strong></p><br>
        <?php } ?>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" class="input-login">
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" class="input-login">
        <input type="submit" value="Log In" class="input-submit">
        <!-- link a registro -->
        <p style="margin-top: 10px;"> Don't have an account? </p>
        <p><strong><a href="/signup">Register here</a></strong></p>
        <!-- mensaje de error -->
        <?php if (isset($_SESSION['mensaje_login'])) { ?>
            <p style="color:red;"><?= $_SESSION['mensaje_login'] ?></p>
            <?php unset($_SESSION['mensaje_login']); ?>
        <?php } ?>

    </form><!-- .FORM -->
</div>
<style>

</style>