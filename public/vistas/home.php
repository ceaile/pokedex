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
            <a href="/card?id_pokemon=<?=$pokemon['id']?>">
            
                <img id="<?= $pokemon['id'] ?>" 
                    src="<?= $pokemon['art']?>"
                    class="w-48 h-48 mx-auto"><!-- .end of img tag -->
            </a>
            <?php foreach ($pokemon['tipos'] as $tipo) { ?>
                <p> <?= $tipo ?> </p>
            <?php } ?>
            <br>
        </div>
    <?php } ?>



</div>

