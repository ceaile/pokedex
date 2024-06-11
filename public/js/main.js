
//MENU HAMBURGUESA - SIN TESTAR
document.addEventListener('DOMContentLoaded', function() {
    var hamburgerMenu = document.getElementById('hamburger-menu');
    var mobileMenu = document.getElementById('mobile-menu');

    hamburgerMenu.addEventListener('click', function() {
        if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
            mobileMenu.style.display = 'flex';
        } else {
            mobileMenu.style.display = 'none';
        }
    });
});

// PARA EL SCROLL VERTICAL
document.getElementById('pokemonContainer').addEventListener('wheel', function(event) {
    if (event.deltaY > 0) {
        this.scrollLeft += 100;
    } else {
        this.scrollLeft -= 100;
    }
    event.preventDefault();
});