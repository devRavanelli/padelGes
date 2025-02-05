document.addEventListener("DOMContentLoaded", function () {
    const sliderItems = document.querySelector(".slider-items");
    const sliderItem = document.querySelectorAll(".slider-item");
    const prevButton = document.querySelector(".slider-prev");
    const nextButton = document.querySelector(".slider-next");

    let currentIndex = 0; // Índice de la noticia visible

    // Función para actualizar la posición del slider
    const updateSliderPosition = () => {
        const itemWidth = sliderItem[0].offsetWidth; // Ancho de una noticia
        sliderItems.style.transform = `translateX(-${currentIndex * itemWidth}px)`; // Mueve el slider
    };

    // Función para mover al índice anterior
    const goToPrevious = () => {
        if (currentIndex === 0) {
            // Si estamos en la primera noticia, ir a la última
            currentIndex = sliderItem.length - 1;
        } else {
            currentIndex--;
        }
        updateSliderPosition();
    };

    // Función para mover al siguiente índice
    const goToNext = () => {
        if (currentIndex === sliderItem.length - 1) {
            // Si estamos en la última noticia, ir a la primera
            currentIndex = 0;
        } else {
            currentIndex++;
        }
        updateSliderPosition();
    };

    // Asignar eventos a los botones
    prevButton.addEventListener("click", goToPrevious);
    nextButton.addEventListener("click", goToNext);

    // Ajustar la posición inicial
    updateSliderPosition();
});
