function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}

// Alternativamente, funciones separadas para abrir y cerrar
function showSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.add('open');
}

function hideSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.remove('open');
}

// Detectar el tamaño de la pantalla para abrir/cerrar automáticamente
window.addEventListener('resize', () => {
    const sidebar = document.getElementById('sidebar');
    if (window.innerWidth < 1250) {
        sidebar.classList.remove('open');
    } else {
        sidebar.classList.add('open');
    }
});

document.addEventListener('DOMContentLoaded', () => {





    document.addEventListener('click', (event) => {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.querySelector('.menu-toggle');
        if (sidebar && toggleButton && !sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
            hideSidebar();
        }
    });
});

 // Añade un evento click a todas las filas con la clase 'clickable-row'
 document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.clickable-row');
    rows.forEach(row => {
        row.addEventListener('click', function () {
            const href = this.getAttribute('data-href');
            if (href) {
                window.location.href = href; // Redirige a la URL del usuario
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual sin parámetros
    let currentUrl = window.location.pathname;

    // Seleccionar todos los enlaces del sidebar
    let links = document.querySelectorAll(".sidebar a");

    links.forEach(link => {
        // Comparar la URL del enlace con la actual
        if (link.href.includes(currentUrl)) {
            link.classList.add("active");
        }
    });
});


