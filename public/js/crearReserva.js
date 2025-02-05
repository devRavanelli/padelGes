 // Al hacer clic en el botón "Crear Reserva"
 document.getElementById("form-reserva").addEventListener("submit", function(e){
    e.preventDefault();  // Prevenir el comportamiento normal del formulario

    Swal.fire({
        title: '¿Estás seguro de crear esta reserva?',
        text: "¡No podrás modificarla después!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, crear reserva',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviamos el formulario mediante AJAX
            var form = document.getElementById("form-reserva");

            var formData = new FormData(form); // Creamos los datos del formulario

            // Enviamos la solicitud AJAX
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Reserva creada!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        window.location.href = "http://127.0.0.1:8000/admin/reservas/mostrar";  // Redirigir a la lista de reservas
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al crear la reserva.',
                        icon: 'error',
                        confirmButtonText: 'Intentar de nuevo'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al enviar la solicitud.',
                    icon: 'error',
                    confirmButtonText: 'Intentar de nuevo'
                });
            });
        }
    });
});

document.getElementById('cancelar').addEventListener('click', function() {
    window.location.href = "http://127.0.0.1:8000/admin/reservas/mostrar"; // Redirige a la ruta usuarios/mostrar
});

$(document).ready(function() {
    $('#id_usuario').select2({
        placeholder: "Selecciona un usuario",
        allowClear: true
    });
});

$(document).ready(function() {
    // Cuando el usuario selecciona una fecha o una pista
    $('#fecha, #id_pista').change(function() {
        var fecha = $('#fecha').val();
        var id_pista = $('#id_pista').val();

        if (fecha && id_pista) {
            $.ajax({
                url: '/admin/reservas/franjas-disponibles', // Ruta al controlador
                type: "GET",
                data: {
                    fecha: fecha,
                    id_pista: id_pista
                },
                success: function(response) {
                    $('#id_franja').empty().append('<option value="">Selecciona una hora</option>');
                    response.forEach(function(franja) {
                        $('#id_franja').append(`<option value="${franja.id}">${franja.hora_inicio}</option>`);
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
