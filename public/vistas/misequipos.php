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
  <div class="equipo" id="">
    <h3><?= $equipo['nombre'] ?>
      <a href="#renameModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"
        data-id="<?= $equipo['id'] ?>">Rename</a>
    </h3>
    <?php foreach ($equipo['seisPokemons'] as $pokemon): ?>
      <?php if ($pokemon['id_pokemon'] != 0) { ?>
        <a href="/remove?id=<?= $pokemon['id_equipopokemon'] ?>">
          <img src="<?= $pokemon['art'] ?>" id="<?= $pokemon['id_equipopokemon'] ?>"
            name="<?= $pokemon['id_equipopokemon'] ?>"><!-- end img tag -->
        </a>
      <?php } ?>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>

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



<script src="../js/editar-equipos.js" type="text/javascript"></script>