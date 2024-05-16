<h1>My Teams</h1>
<?php
var_dump($datosCompletos);
echo "<br>";
print_r($datosCompletos);

/*
array equipos

  cadaequipo  = [
    'id' => int $id_equipo
    'nombre' => string $nombre
    'pokemon' => $6pokemon[]
  ]
  
  cadapokemon =[
    'id_pokemon' => int $id_pokemon,
    'id_equipopokemon' => funcion(id_equipo, id_pokemon)
  ]

*/





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




echo "<br>";
echo "<br>";
<?php foreach ($equipos as $equipo): ?>

  <div class="equipo" id="<?=$equipo['id']?>" value="<?=$equipo['id']?>">

    <h3><?=$equipo['nombre']?></h3>

    <?php foreach ($equipo['pokemon'] as $pokemon): ?>

      <img 
        src="sprite?id=25.png" 
        id="<?php echo $pokemon['id_equipoPokemon']; ?>"
        name="<?php echo $pokemon['id_equipoPokemon']; ?>" 
        value="<?php echo $pokemon['id_pokemon']; ?>"
        alt="<?php echo $pokemon['nombre']; ?>">

    <?php endforeach; ?>

  </div>
  
<?php endforeach; ?>





echo "<br>";
echo "<br>";
<!--Equipo  de ejemplo -->
<div>
  <h3>Mi equipo <span onclick="editarNombre()">editar</span></h3>
  <div>
    <img src="pokemon1.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(1)">
    <img src="pokemon2.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(2)">
    <img src="pokemon3.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(3)">
    <img src="pokemon4.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(4)">
    <img src="pokemon5.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(5)">
    <img src="pokemon6.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)"
      onclick="borrarPokemon(6)">

  </div>
</div>