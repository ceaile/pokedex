<?php
/*
Version rapida de la ficha del pokemon. No debe ser así, porque en realidad el número del pokemon
iria en el footer y se quedaria fijo, mientras que segun vas scrolleando para abajo, con el fondo tambien fijo,
se va desplazando el contenido de la web: la foto, la descripcion, el nombre del pokemon... y poco mas
*/
?>

<audio id="pokemonAudio" src="gritopokemon.mp3" preload="auto"></audio>

<div class="container text-center mt-5">
    <img src="https://th.bing.com/th/id/R.f4699df7bc717c9f8996da48bfec7879?rik=pj8nIL3ZZC8leQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2fpokemon%2fpokemon_PNG14.png&ehk=2ojy1p4%2f0QPeqLqFkJ144kuBrWdBOqSkVEdGuWWIf7s%3d&risl=&pid=ImgRaw&r=0" alt="Pokemon" style="width: 200px; height: 200px;">
    <p id="id-pokemon" name="id_pokemon"><?=$id_pokemon?></p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-pokemon-modal">+</button>
</div>



<!-- ----------Modal------------------------ -->
<div class="modal fade" id="add-pokemon-modal" tabindex="-1" role="dialog" aria-labelledby="add-pokemon-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-pokemon-modal">Add Pokemon to Teams</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="equipoForm" method="post" action="/add">
                    <div class="form-group">
                        <label for="nombreEquipo1"><?=$nombreEquipo1?></label>
                        <input type="checkbox" value="<?=$idEquipo1?>" class="form-control" id="equipo1" name="equipos[]">
                    </div>
                    <div class="form-group">
                        <label for="nombreEquipo2"><?=$nombreEquipo2?></label>
                        <input type="checkbox" value="<?=$idEquipo2?>" class="form-control" id="equipo2" name="equipos[]">
                    </div>
                    <div class="form-group">
                        <label for="nombreEquipo3"><?=$nombreEquipo3?></label>
                        <input type="checkbox" value="<?=$idEquipo3?>" class="form-control" id="equipo3" name="equipos[]">
                    </div>
                    <input type="hidden" name="id_pokemon" value="<?=$id_pokemon?>"> <!-- for testing, 25. sera php$id_pokemon-->

                    <button type="submit" value="idEquipo3" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>




