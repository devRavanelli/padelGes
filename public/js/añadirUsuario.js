
document.getElementById('cancelar').addEventListener('click', function() {
    window.location.href = "https://padelges-production.up.railway.app/admin/usuarios/mostrar"; // Redirige a la ruta usuarios/mostrar
});

document.getElementById('addUserForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe directamente

    const form = event.target;
    let isValid = true;
    const errors = [];

    // Valida el nombre
    const nombre = form.nombre.value.trim();
    if (nombre.length === 0) {
        isValid = false;
        errors.push("El campo 'Nombre' es obligatorio.");
    } else if (nombre.length < 2) {
        isValid = false;
        errors.push("El campo 'Nombre' debe tener al menos 2 caracteres.");
    }

     // Valida el apellido 1
     const apellido1 = form.apellido1.value.trim();
     if (apellido1.length === 0) {
         isValid = false;
         errors.push("El campo 'apellido1' es obligatorio.");
     } else if (apellido1.length < 2) {
         isValid = false;
         errors.push("El campo 'apellido1' debe tener al menos 2 caracteres.");
     }

     // Valida el apellido2
     const apellido2 = form.apellido2.value.trim();
     if (apellido2.length === 0) {
         isValid = false;
         errors.push("El campo 'apellido2' es obligatorio.");
     } else if (apellido2.length < 2) {
         isValid = false;
         errors.push("El campo 'apellido2' debe tener al menos 2 caracteres.");
     }


// Función para validar el DNI o NIE
function validarDNI(value) {
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var str = value.toString().toUpperCase();

    // Validar formato de NIF o NIE
    if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

    // Convertir NIE en un formato de NIF
    var nie = str
        .replace(/^[X]/, '0')
        .replace(/^[Y]/, '1')
        .replace(/^[Z]/, '2');

    var letter = str.substr(-1);
    var charIndex = parseInt(nie.substr(0, 8)) % 23;

    return validChars.charAt(charIndex) === letter;
}

    // Valida el DNI usando la función personalizada
    const dni = form.dni.value.trim();
    if (!validarDNI(dni)) {
        isValid = false;
        errors.push("El DNI/NIE no es válido.");
    }

    // Valida el email
    const email = form.email.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex para validar email
    if (email.length === 0) {
        isValid = false;
        errors.push("El campo 'email' es obligatorio.");
    } else if (email.length < 2) {
        isValid = false;
        errors.push("El campo 'email' debe tener al menos 2 caracteres.");
    }else if(!emailRegex.test(email)){
        isValid = false;
        errors.push("Introduce un email válido");
    }

    // Validar Teléfono
const telefono = form.telefono.value.trim();; // Obtiene el campo de teléfono
if (telefono.length < 9 ) {
    isValid = false;
    errors.push("Introduce un teléfono válido");
}


    // Valida la confirmación de la contraseña
const password = form.password.value;
const passwordConfirmation = form.password_confirmation.value;

// Valida que la contraseña tenga al menos 8 caracteres
if (password.length < 8) {
    isValid = false;
    errors.push("La contraseña debe tener al menos 8 caracteres.");
}

// Valida que las contraseñas coincidan
if (password !== passwordConfirmation) {
    isValid = false;
    errors.push("Las contraseñas no coinciden.");
}

    // Si hay errores, mostrar SweetAlert
    if (!isValid) {
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: errors.join('\n'), // Mostrar los errores como texto
            confirmButtonText: 'Aceptar'
        });
    } else {
        sendFormWithAjax(form);
    }
});

function sendFormWithAjax(form) {
    const formData = new FormData(form);

    fetch(form.action.replace("http://", "https://"), {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Error al procesar la solicitud');
        }
    })
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: 'Usuario creado exitosamente',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = "https://padelges-production.up.railway.app/admin/usuarios/mostrar";
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error: ' + data.message,
                confirmButtonText: 'Aceptar'
            });
        }
    })
    .catch(error => {
        console.error(error);
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Hubo un problema con la solicitud.',
            confirmButtonText: 'Aceptar'
        });
    });
}
