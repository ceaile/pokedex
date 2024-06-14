<div class="pokemon-container lista container" style="opacity: 0;" id="pokemonContainer">
    <?php foreach ($pokedex as $pokemon) : ?>
        <div class="pokemon-item">
            <a href="/card?id_pokemon=<?= $pokemon['id'] ?>">
                <img id="<?= $pokemon['id'] ?>" 
                     src="<?= $pokemon['art'] ?>"
                     class="pokemon-image w-48 h-48 mx-auto">
            </a>
            <div class="types-container flex flex-wrap justify-center">
                <?php foreach ($pokemon['tipos'] as $tipo) : ?>
                    <div class="tipo-<?= strtolower($tipo) ?> rounded-full px-3 py-1 mx-1">
                        <p><?= $tipo ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>
        </div>
    <?php endforeach; ?>
</div>

<style>




</style>

<script>
// PARA EL SCROLL VERTICAL, que solo es necesario en esta pag!
document.getElementById('pokemonContainer').addEventListener('wheel', function(event) {
    if (window.innerWidth > 768) { // Solo para pantallas grandes
        if (event.deltaY > 0) {
            this.scrollLeft += 100;
        } else {
            this.scrollLeft -= 100;
        }
        event.preventDefault();
    }
});
</script>
