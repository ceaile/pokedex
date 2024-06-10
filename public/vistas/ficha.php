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
    <div class="bg-white rounded shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center p-4 border-b">
            <h5 class="text-xl font-bold">Add Pokemon to Teams</h5>
            <button type="button" class="text-gray-600 hover:text-gray-900"
                id="close-checkbox-modal-btn">&times;</button>
        </div>
        <div class="p-4">
            <form id="equipoForm" method="post" action="/add">
                <?php foreach ($equipos as $equipo): ?>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" value="<?= $equipo['id'] ?>" class="form-checkbox h-5 w-5 text-blue-600"
                            id="equipoCheckbox-<?= $equipo['id'] ?>" name="equipos[]">
                        <label for="equipoCheckbox-<?= $equipo['id'] ?>"
                            class="ml-2 text-red-700"><?= $equipo['nombre'] ?></label>
                    </div>
                <?php endforeach; ?>
                <input type="hidden" name="id_pokemon" value="<?= $id_pokemon ?>">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/ficha-modal-equipos.js" type="text/javascript"></script>

<style>
    #close-checkbox-modal-btn:hover {
    border-radius: 50%; /* Hace que el botón sea completamente redondo */
}
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

.tipo-fire {
    background-color: red;
    color: white;
}

.tipo-water {
    background-color: blue;
    color: white;
}

.tipo-grass {
    background-color: green;
    color: white;
}

.tipo-ghost {
    background-color: purple;
    color: white;
}

.tipo-normal {
    background-color: gray;
    color: white;
}

.tipo-fighting {
    background-color: yellow;
    color: black;
}

.tipo-bug {
    background-color: darkgreen;
    color: white;
}

.tipo-dark {
    background-color: black;
    color: white;
}

.tipo-electric {
    background-color: yellow;
    color: black;
}

.tipo-fairy {
    background-color: pink;
    color: white;
}

.tipo-rock {
    background-color: gray;
    color: white;
}

.tipo-flying {
    background-color: lightblue;
    color: black;
}

.tipo-psychic {
    background-color: indigo;
    color: white;
}

.tipo-poison {
    background-color: darkpurple;
    color: white;
}

.tipo-ground {
    background-color: darkyellow;
    color: white;
}

.tipo-steel {
    background-color: lightgray;
    color: black;
}

.tipo-dragon {
    background-color: darkred;
    font-color: white;
}

.tipo-ice {
    background-color: lightblue;
    color: black;
}

.tipo-unknown {
    background-color: gray;
    color: white; /* Color por defecto para tipos desconocidos */
}
</style>

