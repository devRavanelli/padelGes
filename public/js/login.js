document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita el envío estándar del formulario

    // Obtener valores de usuario (DNI) y contraseña
    const dni = document.getElementById("dni").value;
    const password = document.getElementById("password").value;
    const loginUrl = document.getElementById('loginForm').action;

    if (!validarDNI(dni)) {
        Swal.fire({
            icon: "error",
            title: "Error de inicio de sesión",
            text: "Introduzca un DNI válido",
            confirmButtonColor: "#d33",
            width: "40rem",
            timer: 3000,
            timerProgressBar: true,

        });
    } else {
        // Crear un objeto con los datos para enviar
        const formData = {
            dni: dni,
            password: password
        };

        // Enviar petición AJAX al servidor
        fetch(loginUrl.replace("http://", "https://"), {
            method: "POST",
            headers: {
                "Content-Type": "application/json", // Establece el tipo de contenido a JSON
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token desde la meta etiqueta
            },
            body: JSON.stringify(formData) // Convierte los datos en formato JSON
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Inicio de sesión exitoso",
                        text: "Serás redirigido en un momento",
                        showConfirmButton: false,
                        timer: 2000, // Duración en milisegundos
                        width: "40rem"
                    }).then(() => {
                        window.location.href = data.redirect; // Redirige a la página principal
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error de inicio de sesión",
                        text: data.message, // Mostramos el mensaje de error
                        confirmButtonColor: "#d33",
                        width: "40rem",
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
            })
            .catch(error => {
                console.error("Error en la petición:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error de conexión",
                    text: "Hubo un problema con la conexión al servidor.",
                    confirmButtonColor: "#d33",
                    width: "40rem",
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
    }
});


function validarDNI(value) {
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var str = value.toString().toUpperCase();

    if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

    var nie = str
        .replace(/^[X]/, '0')
        .replace(/^[Y]/, '1')
        .replace(/^[Z]/, '2');

    var letter = str.substr(-1);
    var charIndex = parseInt(nie.substr(0, 8)) % 23;

    return validChars.charAt(charIndex) === letter;
}
