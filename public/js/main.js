




//JS PARA EL FONDO POKEBALLS - NO BORRAR  
window.onload = function () {
  resizeBody();
};
window.onresize = function () {
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

