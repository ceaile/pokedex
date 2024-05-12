document.addEventListener('DOMContentLoaded', function() {

    var openModalBtn = document.getElementById('openModalBtn');
    var modal = new bootstrap.Modal(document.getElementById('add-pokemon-modal'));

    openModalBtn.addEventListener('click', function() {
        modal.show();
    });

    /* a saber si esto funciona, de momento aqui se queda 
    if (window.location.pathname.includes('/ficha')) {
        // Reproducir el sonido del Pokémon cuando la página se cargue completamente
        window.addEventListener('load', function() {
            var audio = new Audio('gritopokemon.mp3');
            audio.play();
        });
    } */

});