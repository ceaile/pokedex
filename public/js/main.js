

//PARA PAG MIS EQUIPOS, SIN TESTEAR SI VA
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