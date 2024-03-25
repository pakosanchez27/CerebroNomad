import './bootstrap';
import {actualizarHora} from './hora'
import {validateForm} from './validacionRol'
import {chartHome} from './charts'
// Funcion de hora

// Llamar a la función actualizarHora cada segundo
setInterval(actualizarHora, 1000);

// Llamar a la función una vez para que se muestre la hora inmediatamente
actualizarHora();

validateForm();

chartHome();