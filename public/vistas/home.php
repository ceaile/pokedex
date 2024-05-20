<?php
/*
testeo de parametros de sesion
esta sera la lista con todos los pokemon
caundo se clicke a uno en concreto y abra su pagina con url /ficha
debe tener el id del pokemon como parametro GET
ejemplo: /ficha?id_pokemon=25
*/
?>



<div class="pokemon-container">
    <?php foreach ($pokedex as $pokemon) { ?>
        <div>
            <a href="/ficha?id_pokemon=<?=$pokemon['id']?>">
                <img id="<?= $pokemon['id'] ?>" src="<?= $pokemon['art'] ?>">
            </a>
            <?php /*foreach ($pokemon['tipos'] as $tipo) { ?>
                <p><?= $tipo ?></p>
            <?php } */?>
        </div>
    <?php } ?>



</div>

<div id="spinner" class="spinner-border text-light" role="status">
    <span class="visually-hidden">Loading...</span>





</div>