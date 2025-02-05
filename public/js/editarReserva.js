document.getElementById('cancelar').addEventListener('click', function() {
    window.location.href = "http://127.0.0.1:8000/admin/reservas/mostrar"; // Redirige a la ruta reservas/mostrar
});

$(document).ready(function() {
    // Inicializamos Select2 para el campo "id_usuario"
    $('#id_usuario').select2({
        placeholder: 'Selecciona un usuario',  // Texto que aparece cuando no hay selección
        allowClear: false                     // Permite borrar la selección
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let fechaInput = document.getElementById("fecha");
    let today = new Date().toISOString().split("T")[0]; // Fecha actual en formato YYYY-MM-DD
    fechaInput.setAttribute("min", today);
});


// Seleccionamos el botón para actualizar la reserva
document.getElementById('confirmar-reserva').addEventListener('click', function (e) {
    e.preventDefault();  // Evita que el formulario se envíe de inmediato

    // Verificar si el campo de fecha está vacío o tiene el valor predeterminado
    var fechaInput = document.getElementById('fecha').value;

    if (!fechaInput || fechaInput === 'dd/mm/yyyy') {
        // Mostrar SweetAlert si la fecha no es válida
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingresa una fecha válida.',
        });
    } else {
        // Si la fecha es válida, mostrar el SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Quieres actualizar esta reserva?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, actualizar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviamos el formulario usando AJAX
                var form = document.getElementById('editUserForm');

                var formData = new FormData(form);  // Crea un objeto FormData con los datos del formulario

                // Usamos fetch para enviar el formulario de forma asincrónica
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                })
                .then(response => response.json()) // Suponiendo que la respuesta sea en JSON
                .then(data => {
                    if (data.success) {
                        // Si la reserva se actualizó con éxito, mostramos un mensaje y redirigimos
                        Swal.fire({
                            icon: 'success',
                            title: 'Reserva Actualizada',
                            text: 'Los datos han sido actualizados correctamente.',
                            timer: 1500,  // 1.5 segundos de espera
                            showConfirmButton: false
                        }).then(() => {
                            // Redirige después de un breve retraso a la página de reservas
                            window.location.href = "http://127.0.0.1:8000/admin/reservas/mostrar";
                        });
                    } else {
                        // Si ocurre algún error, mostramos un mensaje de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al actualizar la reserva.',
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al actualizar la reserva.',
                    });
                });
            }
        });
    }
});
$(document).ready(function() {
    console.log('Document ready'); // Verifica que este log se muestre

    let idFranjaOriginal = $("#id_franja").val(); // Obtén el id de la franja original

    function cargarFranjas() {
        let fecha = $("#fecha").val();
        let idPista = $("#id_pista").val();
        console.log($('#fecha').val()); // Verifica que este log se muestre

        if (fecha && idPista) {
            $.ajax({
                url: '/admin/reservas/franjas-disponibles', // Ruta al controlador
                type: "GET",
                data: {
                    fecha: fecha,
                    id_pista: idPista
                },
                success: function(response) {
                    // Limpiamos el select de franjas
                    $('#id_franja').empty();

                    // Añadir la opción "Selecciona una hora"
                    $('#id_franja').append('<option value="">Selecciona una hora</option>');

                    // Solo agregamos las franjas disponibles
                    response.forEach(function(franja) {
                        // Formatear la hora eliminando los segundos
                        let horaFormateada = franja.hora_inicio.substring(0, 5); // Obtén solo la hora y minutos (HH:mm)

                        // Comprobar si la franja está seleccionada
                        let selected = franja.id == idFranjaOriginal ? "selected" : "";

                        // Añadir la opción al select
                        $('#id_franja').append(`<option value="${franja.id}" ${selected}>${horaFormateada}</option>`);
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    }

    // Cargar franjas cuando el usuario cambia la fecha o la pista
    $('#fecha, #id_pista').change(function() {
        cargarFranjas();
    });

     // Cargar las franjas disponibles al cargar la página
});
