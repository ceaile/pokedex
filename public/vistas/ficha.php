<!-- Código HTML -->
<div class="pokemon-container" style="width: 30%; margin: 0 auto; background-color: white; border-radius: 20px;">
    <div class="container text-center mt-5">
        <img src="<?= $pokemon['art'] ?>" alt="Pokemon" class="w-48 h-48 mx-auto">
        <p id="id-pokemon" name="id_pokemon" class="mt-2 text-lg font-semibold"><?= $id_pokemon ?></p>
        <br>
        <div class="flex justify-center">
            <?php foreach ($pokemon['tipos'] as $tipo): ?>
                <div class="tipo-<?= strtolower($tipo) ?> rounded-full px-3 py-1 mx-1">
                    <p style="color: white;"><?= $tipo ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <p>Height: <?= $pokemon['altura'] ?> dm</p>
        <p>Weight: <?= $pokemon['peso'] ?> kg</p>
        <p>Description: <?= $pokemon['descripcion'] ?></p>
        <button type="button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" id="open-checkbox-modal-btn">+</button>
    </div>
</div>

<!-- Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden" id="add-pokemon-modal">
    <div class="bg-white rounded shadow-lg max-w-md w-full rounded-lg">
        <div class="flex justify-between items-start p-4 border-b"> <!-- Cambia 'items-center' a 'items-start' -->
            <h2 class="text-xl font-semibold">Add Pokemon to Teams</h2> <!-- Elimina 'mb-4' -->
            <button type="button" class="text-xl px-2 text-gray-600 bg-transparent hover:text-gray-900 hover:bg-gray-200"
                id="close-checkbox-modal-btn">×</button>
        </div>
        <div class="p-6"> <!-- Aumenta el padding a 'p-6' -->
            <form id="equipoForm" method="post" action="/add" >
                <?php foreach ($equipos as $equipo): ?>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" value="<?= $equipo['id'] ?>" class="form-checkbox h-5 w-5 text-red-800"
                            id="equipoCheckbox-<?= $equipo['id'] ?>" name="equipos[]">
                        <label for="equipoCheckbox-<?= $equipo['id'] ?>"
                            class="ml-2"><?= $equipo['nombre'] ?></label>
                    </div>
                <?php endforeach; ?>
                <input type="hidden" name="id_pokemon" value="<?= $id_pokemon ?>">
                <button type="submit" class="boton-submit">Submit</button>
            </form>
        </div>
    </div>
</div>


<script src="../js/ficha-modal-equipos.js" type="text/javascript"></script>


<style>




/* ... tus otros estilos ... */
#id-pokemon {
    font-size: 2em; /* Hace que el texto sea más grande */
    background: linear-gradient(to bottom, yellow, #ffff99); /* Fondo degradado de amarillo a amarillo claro de arriba a abajo */
    color: darkblue; /* Letra azul oscuro */
}

#open-checkbox-modal-btn {
    background-color: yellow;
    color: black;
    width: 100%;
}

#open-checkbox-modal-btn:hover {
    background-color: red;
}


</style>

