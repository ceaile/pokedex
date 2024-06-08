<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'] ?? '';
    if ($search !== '') {
        $pokedex = array_filter($pokedex, function ($pokemon) use ($search) {
            return strpos(strtolower($pokemon['nombre']), strtolower($search)) !== false;
        });
    }
}
?>

<div class="pokemon-container" style="opacity: 0;">
    <?php foreach ($pokedex as $pokemon) : ?>
        <div>
            <a href="/card?id_pokemon=<?= $pokemon['id'] ?>">
                <img id="<?= $pokemon['id'] ?>" src="<?= $pokemon['art'] ?>" class="w-48 h-48 mx-auto"><!-- .end of img tag -->
            </a>
            <?php foreach ($pokemon['tipos'] as $tipo) : ?>
                <p><?= $tipo ?></p>
            <?php endforeach; ?>
            <br>
        </div>
    <?php endforeach; ?>
</div>