//JS PARA EL FONDO POKEBALLS - NO BORRAR  
window.onload = function() {
  resizeBody();
};

window.onresize = function() {
  resizeBody();
};

function resizeBody() {
  var windowHeight = window.innerHeight;
  document.body.style.height = windowHeight + "px";
}







//JS QUE ESTABA EN LA PAG DE LISTA DE POKEMON QUE HIZO ALEJANDRO
document.addEventListener("DOMContentLoaded", function () {
  const searchButton = document.getElementById("searchBtn");
  searchButton.addEventListener("click", filterPokemons);
});

function filterPokemons() {
  const searchString = document.querySelector("nav ul li input[type='text']").value.toLowerCase();
  const pokemonCards = document.querySelectorAll(".pokemon-block");
  
  const originalOrder = [];
  pokemonCards.forEach(card => {
      originalOrder.push(card.parentElement);
  });
  
  pokemonCards.forEach(card => {
      const pokemonName = card.querySelector(".name").textContent.toLowerCase();
      if (pokemonName.includes(searchString)) {
          card.parentElement.style.display = "block";
      } else {
          card.parentElement.style.display = "none";
      }
  });

  const pokemonContainer = document.querySelector(".pokemon-container");
  pokemonContainer.innerHTML = "";
  originalOrder.forEach(card => {
      pokemonContainer.appendChild(card);
  });
}

//PARA PAG MIS EQUIPOS, SIN TESTEAR SI VA
function mostrarBoton(img) {
    //img.style.cursor = "pointer";
    //;
  }

  function ocultarBoton(img) {
    //img.src = "pokemonX.png"; // Cambiar a la imagen original del Pokémon
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