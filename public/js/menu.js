document.addEventListener('DOMContentLoaded', () => {
    // Menú hamburguesa
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('nav-links');
    const main = document.querySelector('main');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        main.style.marginTop = navLinks.classList.contains('nav-active') ? `${navLinks.scrollHeight + 110}px` : '80px';
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            navLinks.classList.remove('nav-active');
        }
    });



$(document).ready(function() {
    // Efecto de vibración al pasar el ratón por los <li>
    $('.nav-links li').hover(
        function() {
            // Cuando el mouse entra en el li, hacemos vibrar la imagen
            $(this).find('img').addClass('vibrate');
        },
        function() {
            // Cuando el mouse sale del li, quitamos el efecto de vibración
            $(this).find('img').removeClass('vibrate');
        }
    );
});

});
