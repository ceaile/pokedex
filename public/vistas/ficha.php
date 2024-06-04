<!-- <audio id="pokemonAudio" src="gritopokemon.mp3" preload="auto"></audio> -->

<div class="container mx-auto text-center mt-5">
    <img src="<?= $pokemon['art'] ?>" alt="Pokemon" class="w-48 h-48 mx-auto">
    <p id="id-pokemon" name="id_pokemon" class="mt-2 text-lg font-semibold"><?= $id_pokemon ?></p>
    <button type="button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" id="open-checkbox-modal-btn">+</button>
</div>




<!-- Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden" id="add-pokemon-modal">
    <div class="bg-white rounded shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center p-4 border-b">
            <h5 class="text-xl font-bold">Add Pokemon to Teams</h5>
            <button type="button" class="text-gray-600 hover:text-gray-900" id="close-checkbox-modal-btn">&times;</button>
        </div>
        <div class="p-4">

            <form id="equipoForm" method="post" action="/add">

                <?php foreach ($equipos as $equipo) : ?>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" value="<?= $equipo['id'] ?>" class="form-checkbox h-5 w-5 text-blue-600" id="equipoCheckbox-<?= $equipo['id'] ?>" name="equipos[]">
                        <label for="equipoCheckbox-<?= $equipo['id'] ?>" class="ml-2 text-red-700"><?= $equipo['nombre'] ?></label>
                    </div>
                <?php endforeach; ?>


                <input type="hidden" name="id_pokemon" value="<?= $id_pokemon ?>">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
            </form>

        </div>
    </div>
</div>


<script src="../js/ficha-modal-equipos.js" type="text/javascript"></script>