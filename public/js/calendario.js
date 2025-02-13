document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#fechaSeleccionada", {
        enableTime: false, // Solo fechas, sin horas
        dateFormat: "Y-m-d", // Formato compatible con Laravel
        minDate: "today", // No permitir fechas pasadas
        locale: "es" // Español
    });

    document.getElementById("verDisponibilidad").addEventListener("click", verDisponibilidad);
});

function verDisponibilidad() {
    let fecha = document.getElementById("fechaSeleccionada").value;
    if (!fecha) {
        Swal.fire({
            icon: "warning",
            title: "Fecha requerida",
            text: "Por favor, selecciona una fecha antes de continuar.",
            confirmButtonColor: "#007bff"
        });
        return;
    }

    let mainContent = document.querySelector("main");
    mainContent.style.marginBottom = "20vh"; // Ajuste visual

    console.log(pistaId);
        console.log(usuarioId);
    fetch(`/user/${pistaId}/horarios?fecha=${fecha}`)
        .then(response => response.json())
        .then(data => {
            let horariosDiv = document.getElementById("horariosDisponibles");
            horariosDiv.innerHTML = ""; // Limpiar contenido anterior

            if (typeof data !== 'object' || Object.keys(data).length === 0) {
                horariosDiv.innerHTML += "<p>No hay horarios disponibles para esta fecha.</p>";
                return;
            }

            let horariosArray = Object.values(data);
            horariosArray.forEach(hora => {
                let horaElement = document.createElement('div');
                horaElement.classList.add('hora-disponible');
                horaElement.innerHTML = `
                    <p>${hora.hora_inicio}</p>
                    <button class="reservar-btn" data-hora="${hora.hora_inicio}" data-fecha="${fecha}" data-pista-id="${pistaId}" data-usuario-id="${usuarioId}">Reservar</button>
                `;
                horariosDiv.appendChild(horaElement);
            });

            // Agregar evento a los botones de reserva
            let reservarBtns = document.querySelectorAll(".reservar-btn");
            reservarBtns.forEach(btn => {
                btn.addEventListener("click", function () {
                    let horaSeleccionada = this.getAttribute("data-hora");
                    let fechaSeleccionada = this.getAttribute("data-fecha");
                    let pistaId = this.getAttribute("data-pista-id");
                    let usuarioId = this.getAttribute("data-usuario-id");

                    // Llamar a la función para realizar la reserva
                    reservar(fechaSeleccionada, horaSeleccionada, pistaId, usuarioId);
                });
            });
        })
        .catch(error => console.error("Error obteniendo los horarios:", error));
}

function reservar(fecha, hora, pistaId, usuarioId) {
    fetch(`/user/${pistaId}/reservar`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            fecha: fecha,
            hora: hora,
            pista_id: pistaId,
            usuario_id: usuarioId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: "success",
                title: "Reserva confirmada",
                text: "Tu reserva ha sido realizada con éxito.",
                confirmButtonColor: "#007bff"
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error en la reserva",
                text: data.error || "Hubo un problema al hacer la reserva.",
                confirmButtonColor: "#d33"
            });
        }
    })
    .catch(error => {
        console.error("Error realizando la reserva:", error);
        Swal.fire({
            icon: "error",
            title: "Error inesperado",
            text: "Ocurrió un problema con la reserva. Inténtalo nuevamente.",
            confirmButtonColor: "#d33"
        });
    });
}
