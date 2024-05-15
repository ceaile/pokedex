<h1>My Teams</h1>
<?php
var_dump($datosCompletos);
echo "<br>";
print_r($datosCompletos);
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



