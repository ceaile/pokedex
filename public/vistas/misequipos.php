<h1>Mis Equipos</h1>

<!-- Equipo 1 -->
<div>
  <h3>Mi equipo 1 <span onclick="editarNombre(1)">editar</span></h3>
  <div>
    <img src="pokemon1.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(1)">
    <img src="pokemon2.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(2)">
    <!-- Añadir más imágenes aquí -->
  </div>
</div>

<!-- Equipo 2 -->
<div>
  <h3>Mi equipo 2 <span onclick="editarNombre(2)">editar</span></h3>
  <div>
    <img src="pokemon3.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(3)">
    <img src="pokemon4.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(4)">
    <!-- Añadir más imágenes aquí -->
  </div>
</div>

<!-- Equipo 3 -->
<div>
  <h3>Mi equipo 3 <span onclick="editarNombre(3)">editar</span></h3>
  <div>
    <img src="pokemon5.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(5)">
    <img src="pokemon6.png" class="pokemon-img" onmouseover="mostrarBoton(this)" onmouseout="ocultarBoton(this)" onclick="borrarPokemon(6)">
    <!-- Añadir más imágenes aquí -->
  </div>
</div>

<script>
  function mostrarBoton(img) {
    img.style.cursor = "pointer";
    img.src = "menos.png";
  }

  function ocultarBoton(img) {
    img.src = "pokemonX.png"; // Cambiar a la imagen original del Pokémon
  }

  function borrarPokemon(id) {
    // Llamar a la función de tu controlador para borrar el Pokémon con el ID especificado
    // Por ejemplo, podrías hacer una petición AJAX a tu controlador PHP
    console.log("Borrar Pokémon con ID:", id);
  }

  function editarNombre(id) {
    // Llamar a la función de tu controlador para editar el nombre del equipo con el ID especificado
    // Por ejemplo, podrías mostrar un cuadro de diálogo para que el usuario introduzca el nuevo nombre
    console.log("Editar nombre del equipo con ID:", id);
  }
</script>


