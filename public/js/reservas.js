 // Esperamos a que el DOM esté completamente cargado
 document.addEventListener('DOMContentLoaded', function() {



    // Seleccionamos todos los botones de eliminar por su id (usando el ID único de cada reserva)
    const deleteButtons = document.querySelectorAll('[id^="deleteBtn"]');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const reservaId = button.id.replace('deleteBtn', ''); // Extraemos el ID de la reserva

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta reserva será eliminada permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviamos el formulario
                    document.getElementById('deleteForm' + reservaId).submit();
                }
            });
        });
    });




});
