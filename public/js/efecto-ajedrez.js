
//PRELOADER - FUNCIONA BIEN
window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    var backgroundImage = document.querySelector('.background-image');
    var content = document.querySelector('.pokemon-container');
  
    // Duración del GIF del preloader en milisegundos
    var gifDuration = 1500;
    var fadeOutDuration = 500; // Duración del fade out
  
    // Mostrar el preloader durante la duración del GIF menos el tiempo de fade out
    setTimeout(function() {
        // Iniciar fade out
        preloader.style.opacity = '0';
  
        // Ocultar el preloader después del fade out
        setTimeout(function() {
            preloader.style.display = 'none';
  
            // Fade in background image
            setTimeout(function() {
                backgroundImage.style.opacity = '1';
            }, 80); // Ajusta el retraso para la transición de la imagen de fondo
  
            // Fade in content after background image
            setTimeout(function() {
                content.style.opacity = '1';
            }, 700); // Ajusta el retraso para la transición del contenido
        }, fadeOutDuration);
  
    }, gifDuration - fadeOutDuration); // Iniciar el fade out antes de que termine el GIF
  });