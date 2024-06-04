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
<!-- Iteracion -->


<?php foreach ($equipos as $equipo): ?>

  <div class="equipo" id="">

    <h3><?= $equipo['nombre'] ?><span onclick="editarNombre()">editar</span></h3>

    <?php foreach ($equipo['seisPokemons'] as $pokemon): ?>
      <?php if ($pokemon['id_pokemon'] != 0) { ?>
        <a href="/remove?id=<?=$pokemon['id_equipopokemon']?>">
          <img src="<?= $pokemon['art'] ?>" 
                id="<?= $pokemon['id_equipopokemon'] ?>"
                name="<?= $pokemon['id_equipopokemon'] ?>"><!-- end img tag -->
        </a>
      <?php } ?>
    <?php endforeach; ?>

  </div>

<?php endforeach; ?>