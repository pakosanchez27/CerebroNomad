
export function validateForm() {
    const form = document.querySelector('#form-rol');
    const registro = {
        name: '',
        apellido_paterno: '',
        email: '',
        rol: ''
    }

  
    const name = document.querySelector('#name');
    const apellido = document.querySelector('#apellido_paterno');
    const email = document.querySelector('#email');
    const rol = document.querySelector('#rol');
    const btnSubmit = document.querySelector('#btnSubmit');
    

    name.addEventListener('blur', validar);
    apellido.addEventListener('blur', validar);
    email.addEventListener('blur', validar);
    rol.addEventListener('blur', validar);

 function validar(e){
  console.log(e.target.value);
    if(e.target.value.trim() === ''){
        mostrarAlerta(`El campo ${e.target.id} es obligatorio`, e.target.parentElement);
        registro[e.target.name] = '';
        comprobarEmail();
        return;
    }

    
    if (e.target.id === 'email' && !validarEmail(e.target.value)) {
        mostrarAlerta('El email no es valido', e.target.parentElement);
        registro[e.target.name] = '';
        comprobarEmail();
        return;
    }
    console.log(registro);
    limpiarAlerta(e.target.parentElement);

    //asignar los valores
    registro[e.target.name] = e.target.value.trim().toLowerCase();

    // Comprobar el objto de email
    comprobarEmail();


 }
 function mostrarAlerta(mensaje, referencia) {
    // Limpiar alrtas
    limpiarAlerta(referencia);

    // Generar alert en HTML
    const error = document.createElement('P');
    error.textContent = mensaje;
    error.classList.add('text-danger', 'h5', 'errorForm')

    // Inyectar el error al formulario
    referencia.appendChild(error);
}

function limpiarAlerta(referencia) {
    // Limpiar alrtas
    const alerta = referencia.querySelector('.errorForm');
    if (alerta) {
        alerta.remove();
    }
}

function validarEmail(email) {
    const regex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    const resultado = regex.test(email);
    return resultado;
}

function comprobarEmail() {
    console.log(Object.values(registro).includes(''));
    if (Object.values(registro).includes('')) {
        btnSubmit.classList.add('opacity-50');
        btnSubmit.disabled = true;
        return;
    }
      console.log(Object.values(registro));
    btnSubmit.classList.remove('opacity-50');
    btnSubmit.disabled = false;

}
}