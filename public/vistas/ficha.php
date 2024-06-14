<!-- Código HTML -->
<div class="pokemon-container pokemon-container-ficha overflow-y-auto">
    <div class="container p-4 container-ficha">
        <div class="flex">
            <?php foreach ($pokemon['tipos'] as $tipo): ?>
                <div class="tipo-<?= strtolower($tipo) ?> rounded-full px-3 py-1 mx-1">
                    <p style="color: white;"><?= $tipo ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-center">
            <img src="<?= $pokemon['art'] ?>" alt="Pokemon" class="object-contain imagen-pkmn">
        </div>

        <div class="flex justify-end">
            <button type="button" id="open-checkbox-modal-btn" class="boton-submit-checkbox-addPkmn">+</button>
            <p id="id-pokemon" name="id_pokemon" class="numero-pkmn"><strong><?= $id_pokemon ?></strong></p>
        </div>

        <div class="datos-pkmn-container">
            <p>Height: <span class="datos"><?= $pokemon['altura'] ?> dm</span></p>
            <p>Weight: <span class="datos"><?= $pokemon['peso'] ?> kg</span></p>
            <p>Description:</p>
            <p class="datos"><?= $pokemon['descripcion'] ?></p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden" id="add-pokemon-modal">
    <div class="bg-white rounded shadow-lg max-w-md w-full rounded-lg">
        <div class="flex justify-between items-start p-4 border-b"> <!-- Cambia 'items-center' a 'items-start' -->
            <h2 class="text-xl font-semibold">Add Pokemon to Teams</h2> <!-- Elimina 'mb-4' -->
            <button type="button"
                class="text-xl px-2 text-gray-600 bg-transparent hover:text-gray-900 hover:bg-gray-200"
                id="close-checkbox-modal-btn">×</button>
        </div>
        <div class="p-6"> <!-- Aumenta el padding a 'p-6' -->
            <form id="equipoForm" method="post" action="/add">
                <?php foreach ($equipos as $equipo): ?>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" value="<?= $equipo['id'] ?>" class="form-checkbox h-5 w-5 text-red-800"
                            id="equipoCheckbox-<?= $equipo['id'] ?>" name="equipos[]">
                        <label for="equipoCheckbox-<?= $equipo['id'] ?>" class="ml-2"><?= $equipo['nombre'] ?></label>
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
    .pokemon-container-ficha {
        margin: 0 auto;
        border-radius: 20px;
        margin-top: 5vh;
        margin-bottom: 5vh;
        height: 70vh;
        overflow-y: auto;
        width: 50%;
        ::-webkit-scrollbar {
            display: none;
        }
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .datos-pkmn-container {
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 20px;
        margin-top: 2vh;
    }

    /*
    @media (min-width: 769px) {
        .pokemon-container-ficha {
           
        }
    }*/

    /* para pantallas móviles */
    @media (max-width: 1240px) {
        .pokemon-container-ficha {
            margin: 0 auto;
            width: 90%;
        }

        .numero-pkmn,
        .boton-submit-checkbox-addPkmn {
            font-size: 2em;
        }

        .imagen-pkmn {}

    }


    .container-ficha {
        padding: 0px;
    }

    .imagen-pkmn {
        height: 40%;
        width: 40%;
    }

    .datos {
        font-weight: bold;
        background-color: rgba(0, 255, 255, 0.5);
        border-radius: 15px;
    }

    /* ... tus otros estilos ... */
</style>