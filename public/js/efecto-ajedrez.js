
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
        preloader.style.opacity = '0';
        setTimeout(function() {
            preloader.style.display = 'none';

            setTimeout(function() {
                backgroundImage.style.opacity = '1';
            }, 80);
  
           
            setTimeout(function() {
                content.style.opacity = '1';
            }, 700);
        }, fadeOutDuration);
  
    }, gifDuration - fadeOutDuration);
  });