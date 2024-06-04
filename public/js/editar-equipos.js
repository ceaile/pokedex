//cambiar nombre de equipo
document.addEventListener('DOMContentLoaded', () => {
    const modalRenombre = document.getElementById('renameModal');
    const closeRenameModalButton = document.getElementById('closeRenameModal');
    const renameButtons = document.querySelectorAll('a[href="#renameModal"]');
  
    // Agregar event listener a todos los botones de renombrar
    renameButtons.forEach(button => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        id_equipo_a_renombrar = event.target.getAttribute('data-id');
        document.querySelector('#teamId').value = id_equipo_a_renombrar;
        modalRenombre.classList.remove('hidden');
      });
    });
  
    // Event listener para cerrar el modal
    closeRenameModalButton.addEventListener('click', () => {
      modalRenombre.classList.add('hidden');
    });
  
    // Event listener para el formulario de renombrar
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
  });

  

  
//quitar pokemon del equipo