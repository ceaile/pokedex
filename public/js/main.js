
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

