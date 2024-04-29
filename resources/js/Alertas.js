import Swal from 'sweetalert2';


// Cambia de confirmDelet a confirmDelete
function confirmDelete(e) {
    e.preventDefault(); // Previene el comportamiento predeterminado del evento (enviar el formulario)

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás revertir esto',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma la eliminación, puedes enviar el formulario manualmente
            e.target.submit(); // Esto enviará el formulario actual
        }
    });
}
