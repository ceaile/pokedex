//js para el modal de tailwind
document.addEventListener('DOMContentLoaded', function () {
    var openCheckboxModalBtn = document.getElementById('open-checkbox-modal-btn');
    var closeCheckboxModalBtn = document.getElementById('close-checkbox-modal-btn');
    var modalCheckboxDeFicha = document.getElementById('add-pokemon-modal');

    openCheckboxModalBtn.addEventListener('click', function () {
        modalCheckboxDeFicha.classList.remove('hidden');
    });

    closeCheckboxModalBtn.addEventListener('click', function () {
        modalCheckboxDeFicha.classList.add('hidden');
    });

    window.addEventListener('click', function (event) {
        if (event.target === modalCheckboxDeFicha) {
            modalCheckboxDeFicha.classList.add('hidden');
        }
    });
});