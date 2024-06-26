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
        'arte' => blabla //mentirijilla, esto no iba aqui
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
<div class="pokemon-container pokemon-container-equipos" style="opacity: 0;">
  <?php foreach ($equipos as $equipo) : ?>
    <div class="equipo div-equipo">
      <div class="div-intern-equipo">
        <div class="div-intern2-equipo">
          <h3 class="nombre-equipo">
            <?= htmlspecialchars($equipo['nombre']) ?>
          </h3>
          <a href="#renameModal" class="link-renombre" data-id="<?= htmlspecialchars($equipo['id']) ?>">Rename</a>
          <!-- Botón -->
        </div>
      </div>

      <div class="flex justify-center div-seis-pkmns">
        <?php foreach ($equipo['seisPokemons'] as $pokemon) : ?>
          <?php if ($pokemon['id_pokemon'] != 0) : ?>
            <div class="pokemon-view-container">
              <div class="pokemon-img-container" onclick="confirmarEliminacion(<?= htmlspecialchars($pokemon['id_equipopokemon']) ?>)" class="boton-menos-quitar-pkmn">
                <img src="<?= htmlspecialchars($pokemon['art']) ?>" id="<?= htmlspecialchars($pokemon['id_equipopokemon']) ?>" name="<?= htmlspecialchars($pokemon['id_equipopokemon']) ?>" class="w-16 sm:w-24 md:w-20 lg:w-32 xl:w-36 sprite-pkmn">
              </div>
              <a href="card?id_pokemon=<?= htmlspecialchars($pokemon['id_pokemon']) ?>" class="view-button-mobile bg-yellow-500 hover:bg-yellow-700 text-white px-2 py-1 
          block text-center w-16 sm:w-24 md:w-20 lg:w-32 xl:w-36 boton-ver-pkmn">View</a>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>
  <?php endforeach; ?>
</div>






<!-- MODALES: -->
<!-- Modal de eliminar Pokémon -->
<div id="modal-conf-eliminacion" class="hidden flex items-center justify-center fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75">
  <div class="relative p-4 bg-white shadow max-w-md modalEliminacion">
    <button id="botonXcerrarModalConfEliminacion" type="button" class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close modal</span>
    </button>
    <div class="p-4 text-center">
      <svg class="mx-auto mb-4 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
      <h3 class="mb-5 text-lg font-normal text-grey-950 dark:text-grey-950">Are you sure you want to remove this Pokémon
        from your team?</h3>
      <button data-modal-hide="modal-conf-eliminacion" id="botonConfirmarModalEliminacion" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium text-sm inline-flex items-center px-5 py-2.5 text-center">
        Yes, I'm sure
      </button>
      <button id="botonCancelModalConfElimin" data-modal-hide="modal-conf-eliminacion" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
        cancel</button>
    </div>
  </div>
</div>

<!-- Modal de renombrar -->
<div id="renameModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 shadow-md w-80 modalRenombrar flex flex-col items-center">
    <h2 class="text-xl font-semibold mb-4">Change Team's Name</h2>
    <form id="teamRenameForm" class="w-full flex flex-col items-center">
      <input type="hidden" id="teamId" name="equipoId"> <!-- Campo oculto para el ID del equipo -->
      <input type="text" placeholder="New team name" class="border p-2 w-full mb-4 inputRenombrar" id="nuevoNombreEquipo" name="nuevoNombre"> <!-- Campo de entrada para el nuevo nombre -->
      <div>
        <button id="confirmRenameButton" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2" type="submit">Confirm</button>
        <button id="closeRenameModal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
          Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Alerta oculta de éxito o fracaso -->
<div id="notification-container" class="fixed top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2">
  <div id="notification" class="alerta flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-full bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 hidden" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium" id="notification-title">Success! Hooray!</span>
      <span id="notification-message">Everything went according to keikaku.</span>
    </div>
  </div>
</div>

<script src="../js/editar-equipos.js" type="text/javascript"></script>