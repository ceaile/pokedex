//js para el modal de tailwind
document.addEventListener('DOMContentLoaded', function () {
  var openModalBtn = document.getElementById('open-modal-btn');
  var closeModalBtn = document.getElementById('close-modal-btn');
  var modal = document.getElementById('add-pokemon-modal');

  openModalBtn.addEventListener('click', function () {
    modal.classList.remove('hidden');
  });

  closeModalBtn.addEventListener('click', function () {
    modal.classList.add('hidden');
  });

  window.addEventListener('click', function (event) {
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
  });
});

//--------MODAL DE RENOMBRAR EQUIPO-------------------
/**
 * Explicacion detallada: El user clicka en el enlace de renombrar de la vista.
 * El script js ejecuta la apertura del modal recogiendo ese click.
 * Hay otra funcion js esperando el click de cierre del modal tambien.
 * Y las otras funciones: una que recoge el click de enviar y el input que puso el user,
 * que ademas recoge el atributo data-id del <a> y se lo coloca al input hidden del modal.
 * Al pulsar el boton de submit, se ejecuta la funcion que conecta con el controlador
 * mediante fetch() ajax, que recoge tambien el valor del input
 * y le envia el nombre nuevo y el id necesario mediante post.
 */
const modalRenombre = document.getElementById('renameModal');
const closeRenameModalButton = document.getElementById('closeRenameModal');
document.querySelector('a[href="#renameModal"]').addEventListener('click', () => {
  modalRenombre.classList.remove('hidden'); //quita el hidden (o sea queda visible)
});
closeRenameModalButton.addEventListener('click', () => {
  modalRenombre.classList.add('hidden'); //oculta, cierra el modal
});

/**
 * No tiene value el input hidden de php porque aqui se le añade el valor
 * del data-id del <a> que estaba fuera del modal.
 */
let id_equipo_a_renombrar;
const renameButton = document.querySelector('a[href="#renameModal"]');
renameButton.addEventListener('click', (event) => {
  event.preventDefault();
  id_equipo_a_renombrar = event.target.getAttribute('data-id');
  document.querySelector('#teamId').value = id_equipo_a_renombrar;
  modalRenombre.classList.remove('hidden');
});

document.getElementById('teamRenameForm').addEventListener('submit', function (event) {
  event.preventDefault();
  const nuevoNombre = document.getElementById('nuevoNombreEquipo').value; //valor del input
  const data = {
    id_equipo_a_renombrar, //creado en la funcion anterior
    nuevoNombre
  };
  fetch('/rename', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.text())
    .then(data => {
      
      modalRenombre.classList.add('hidden');
      if (data.success) {
        window.location.reload();
        // Recarga la página después de un cambio exitoso
      } else {
        console.error('Error al renombrar el equipo:', data.message);
      }
    })
    .catch(error => {
      console.error('Error al enviar la solicitud:', error);
      modalRenombre.classList.add('hidden');
    });
});
// .FUNCION DE RENOMBRE DE EQUIPO----------------------------------------




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