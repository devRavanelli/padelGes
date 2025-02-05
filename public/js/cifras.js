document.addEventListener('DOMContentLoaded', () => {
    // Función para animar el conteo
    function animateCount(element, targetNumber, duration, suffix = '') {
        const start = 0; // Número inicial
        const increment = Math.ceil(targetNumber / (duration / 50)); // Incremento basado en duración
        let currentNumber = start;

        const interval = setInterval(() => {
            currentNumber += increment;
            if (currentNumber >= targetNumber) {
                currentNumber = targetNumber; // Asegurarse de no superar el número final
                clearInterval(interval); // Detener la animación
            }
            element.textContent = currentNumber.toLocaleString() + suffix; // Actualizar el número mostrado con formato
        }, 50); // Tiempo entre cada incremento (50ms)
    }

    // Configurar el Intersection Observer
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Obtener el número objetivo directamente del HTML
                let textContent = entry.target.textContent.replace(/,/g, '').trim();
                let match = textContent.match(/(\d+)(\s*m2)?/i);
                if (match) {
                    const targetNumber = parseInt(match[1], 10);
                    const suffix = match[2] ? ' m2' : '';
                    if (!isNaN(targetNumber)) {
                        animateCount(entry.target, targetNumber, 2000, suffix); // Animar durante 2 segundos
                    }
                }
                observer.unobserve(entry.target); // Dejar de observar el elemento después de la animación
            }
        });
    }, { threshold: 0.5 }); // Activar cuando el 50% del elemento sea visible

    // Seleccionar todos los elementos de conteo
    document.querySelectorAll('.total-usuarios').forEach(element => {
        observer.observe(element); // Iniciar la observación
    });
});
