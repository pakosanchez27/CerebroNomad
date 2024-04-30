


// Selecciona todos los formularios con la clase 'deleteForm'
const deleteForms = document.querySelectorAll('.deleteForm');

// Itera sobre cada formulario y agrega un controlador de eventos para el evento de envío del formulario
deleteForms.forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        // Mostrar la alerta de confirmación
        Swal.fire({
            title: "¿Estás seguro de eliminar?",
            text: "Una vez eliminado, no podrás recuperar este registro",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            // Si el usuario confirma la acción, enviar el formulario
            if (result.isConfirmed) {
                form.submit(); // Envía el formulario asociado
            }
        });
    });
});


document.querySelector('.resetPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    // Mostrar la alerta de confirmación
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Una vez restablecida la contraseña, se enviará un correo electrónico al usuario con la nueva contraseña",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, restablecer",
        cancelButtonText: "No, cancelar",
        reverseButtons: true
    }).then((result) => {
        // Si el usuario confirma la acción, enviar el formulario
        if (result.isConfirmed) {
            // Mostrar una alerta de éxito antes de enviar el formulario
            Swal.fire({
                title: "Restablecida",
                text: "La contraseña ha sido restablecida correctamente. Se enviará un correo electrónico al usuario con la nueva contraseña.",
                icon: "success"
            }).then(() => {
                // Envía el formulario
                event.target.submit();
            });
        }
    });
});
