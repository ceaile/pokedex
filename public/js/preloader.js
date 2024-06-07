
/* JavaScript para ocultar el preloader y mostrar el contenido 
después de que se carguen todos los elementos de la página */

window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    var content = document.querySelector('.pokemon-container');

    // Oculta el preloader y muestra el contenido de la página
    preloader.style.opacity = '0';
    setTimeout(function() {
        preloader.style.display = 'none';
        content.style.opacity = '1';
    }, 1500); // Ajusta este valor según sea necesario para permitir que la transición se complete
});