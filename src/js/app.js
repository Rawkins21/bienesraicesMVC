document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkmode();
});

function darkmode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDarkmode.matches); imprime en consola si darkmode esta activado en el s.o

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() { //cambio automatico del darkmode al cambiar la config del s.o
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode') // toogle agrega o quita la clase correspondiente
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }
}