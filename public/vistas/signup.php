<div class="pokemon-container pokemon-container-login">
    <form action=" /signedin" method="post" class="form-login">
        <p><strong>Welcome!</strong></p><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="input-signup">

        <label for="password">Password:</label><br>
        <input type="password" id="password1" name="password1" class="input-signup">

        <label for="password">Repeat Password:</label>
        <input type="password" id="password2" name="password2" class="input-signup">

        <input type="submit" value="Sign up" class="input-submit">
        <!-- link a registro -->
        <p style="margin-top: 10px;">Already have an account? </p>
        <p><strong><a href="/login">Register here</a></strong></p>
        <!-- mensaje de error -->
        <?php if (isset($_SESSION['mensaje_signup'])) { ?>
            <p style="color:red;"><?= $_SESSION['mensaje_signup'] ?></p>
            <?php unset($_SESSION['mensaje_signup']); ?>
        <?php } ?>
        <!-- mensaje de error -->
    </form>





</div>
<style>

</style>