<h1>My Teams</h1>
<?php
/*
array (
  0 => 
  array (
    'id' => 4,
    'nombre' => NULL,
    'seisPokemons' => 
    array (
      0 => 
      array (
        'id_equipopokemon' => 5,
        'id_pokemon' => 0,
      ),
      1 => 
      array (
        'id_equipopokemon' => 6,
        'id_pokemon' => 0,
      ),
      2 => 
      array (
        'id_equipopokemon' => 7,
        'id_pokemon' => 0,
      ),
      3 => 
      array (
        'id_equipopokemon' => 8,
        'id_pokemon' => 0,
      ),
      4 => 
      array (
        'id_equipopokemon' => 9,
        'id_pokemon' => 0,
      ),
      5 => 
      array (
        'id_equipopokemon' => 10,
        'id_pokemon' => 0,
      ),
    ),
  ),
  

*/
?>
<!-- Iteracion de pokemon -->
<?php foreach ($equipos as $equipo): ?>
  <div class="equipo">
    <h3><?= $equipo['nombre'] ?>
      <a href="#renameModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"
        data-id="<?= $equipo['id'] ?>">Rename</a>
    </h3>

    <?php foreach ($equipo['seisPokemons'] as $pokemon): ?>
      <?php if ($pokemon['id_pokemon'] != 0) { ?>
        <div  
           
           onclick="confirmarEliminacion(<?=$pokemon['id_equipopokemon']?>)"
           ><!-- .fin a tag -->
          <img src="<?= $pokemon['art'] ?>" id="<?= $pokemon['id_equipopokemon'] ?>"
            name="<?= $pokemon['id_equipopokemon'] ?>" class="w-48 h-48 mx-auto"
            id="imagenLinkPokemon"><!-- end img tag -->
      </div>

      <?php } ?>

    <?php endforeach; ?>
  </div>
<?php endforeach; ?>


<!-- modal de eliminar pokemon -->
<div id="modal-conf-eliminacion" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button id="botonXcerrarModalConfEliminacion"
                  type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this pokemon from your team?</h3>
                <button data-modal-hide="modal-conf-eliminacion"
                        id="botonConfirmarModalEliminacion"
                        type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button id="botonCancelModalConfElimin" data-modal-hide="modal-conf-eliminacion" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal de renombrar -->
<div id="renameModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-md shadow-md w-80">
        <h2 class="text-xl font-semibold mb-4">Change Team's Name</h2>
        <form id="teamRenameForm">
            <!-- Campo oculto para el ID del equipo      ?????       -->
            <input type="hidden" id="teamId" name="equipoId">
            <!-- Campo de entrada para el nuevo nombre -->
            <input type="text" placeholder="Nuevo nombre del equipo" class="border p-2 w-full mb-4"
                   id="nuevoNombreEquipo" name="nuevoNombre">

            <button id="confirmRenameButton"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md"
                    type="submit">Confirm
            </button>
            <button id="closeRenameModal" class="text-gray-500 hover:text-gray-600 ml-2">Cerrar</button>
        </form>
    </div>
</div>


<!-- alert oculto de exito o fracaso -->
<div id="notification-container" class="fixed top-0 right-0 m-4">
  <div id="notification" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 hidden" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium" id="notification-title">Success! Hooray!</span> <span id="notification-message">Everything went according to keikaku.</span>
    </div>
  </div>
</div>

<script src="../js/editar-equipos.js" type="text/javascript"></script>