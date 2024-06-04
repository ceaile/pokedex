/**
 * Explicacion detallada: El user clicka en el enlace de renombrar de la vista.
 * El script js ejecuta la apertura del modal recogiendo ese click.
 * Hay otra funcion js esperando el click de cierre del modal tambien.
 * Y las otras funciones: una que recoge el click de enviar y el input que puso el user,
 * que ademas recoge el atributo data-id del <a> y se lo coloca al input hidden del modal.
 * Al pulsar el boton de submit, se ejecuta la funcion que conecta con el controlador
 * mediante fetch() ajax, que recoge tambien el valor del input
 * y le envia el nombre nuevo y el id necesario mediante post.
 * Luego, se va al controlador EquiposController: recoge los datos del json,
 * ejecuta la funcion en bbdd, y devuelve otro json a este archivo js.
 * Comprueba si es error o success y hace visible el alert de la vista con los colores
 * y los mensajes adecuados.
 */

//cambiar nombre de equipo
document.addEventListener('DOMContentLoaded', () => {
    const modalRenombre = document.getElementById('renameModal');
    const closeRenameModalButton = document.getElementById('closeRenameModal');
    const renameButtons = document.querySelectorAll('a[href="#renameModal"]');
  
    //event listeners para todos los botones de renombrar
    renameButtons.forEach(button => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        id_equipo_a_renombrar = event.target.getAttribute('data-id'); //lo coge del <a data-id="">
        document.querySelector('#teamId').value = id_equipo_a_renombrar;
        modalRenombre.classList.remove('hidden'); //quita hidden. o sea, lo hace visible
      });
    });
  
    closeRenameModalButton.addEventListener('click', () => {
      modalRenombre.classList.add('hidden'); //para cerrar el modal
    });
  
    //event listener para el formulario de renombrar
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
      .then(response => response.json())
      .then(data => {
        modalRenombre.classList.add('hidden');
        if (data.success) {
          showNotification('success', 'Your team was renamed successfully.');
          setTimeout(() => {
            window.location.reload(); // Recarga la página después de un cambio exitoso
          }, 2000); // Espera 2 segundos antes de recargar la página
        } else {
          showNotification('error', 'There was a problem renaming your team: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Error al enviar la solicitud:', error);
        showNotification('error', 'Hubo un error en la solicitud.');
        modalRenombre.classList.add('hidden');
      });
  });
});//fin de func .document.addEventListener('DOMContentLoaded', ()

function showNotification(type, message) {
  const notification = document.getElementById('notification');
  const notificationTitle = document.getElementById('notification-title');
  const notificationMessage = document.getElementById('notification-message');

  // Actualizar el contenido de la notificación
  notificationTitle.textContent = type === 'success' ? 'Success! Yay!' : 'Error! Sorry :(';
  notificationMessage.textContent = message;

  // Cambiar el estilo según el tipo
  if (type === 'success') {
    notification.classList.remove('text-red-800', 'border-red-300', 'bg-red-50');
    notification.classList.add('text-green-800', 'border-green-300', 'bg-green-50');
  } else {
    notification.classList.remove('text-green-800', 'border-green-300', 'bg-green-50');
    notification.classList.add('text-red-800', 'border-red-300', 'bg-red-50');
  }

  // Mostrar la notificación
  notification.classList.remove('hidden');

  // Ocultar la notificación después de 3 segundos
  setTimeout(() => {
    notification.classList.add('hidden');
  }, 3000);
} 

  


//quitar pokemon del equipo