<h1>My Teams</h1>
<?php
//echo '<pre>' . var_export($equiposDeUsua, true) . '</pre>';
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
  


?>
<!-- Iteracion -->
<?php /* foreach ($equipos as $equipo) { ?>
<div>
<h3>Mi equipo 2 <span onclick="editarNombre($equipo['id'])">editar</span></h3>
<div>
 <?php foreach ($pokemons as $pokemon) { ?>
   <img src="pokemon1.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(1)">
 <?php } ?>
</div>
</div>
<?php  }*/ ?>

<?php foreach ($equipos as $equipo) : ?>

  <div class="equipo" id="" value="">

    <h3><?= $equipo['nombre'] ?></h3>

    <?php foreach ($equipo['seisPokemons'] as $pokemon) : ?>

      <img src="https://dummyimage.com/100" 
      id="<?php echo $pokemon['id_equipopokemon']; ?>" 
      name="" 
      alt="">

    <?php endforeach; ?>

  </div>

<?php endforeach; ?>





echo "<br>";
echo "<br>";
<!--Equipo  de ejemplo -->
<div>
  <h3>Mi equipo <span onclick="editarNombre()">editar</span></h3>
  <div>
    <img src="pokemon1.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(1)">
    <img src="pokemon2.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(2)">
    <img src="pokemon3.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(3)">
    <img src="pokemon4.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(4)">
    <img src="pokemon5.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(5)">
    <img src="pokemon6.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(6)">

  </div>
</div>