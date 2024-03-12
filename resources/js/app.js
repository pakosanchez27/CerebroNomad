import './bootstrap';

function actualizarHora() {
    // Obtener la hora actual
    var ahora = new Date();
    var horas = ahora.getHours();
    var minutos = ahora.getMinutes();
    var segundos = ahora.getSeconds();

    // Formatear la hora
    horas = (horas < 10 ? "0" : "") + horas;
    minutos = (minutos < 10 ? "0" : "") + minutos;
    segundos = (segundos < 10 ? "0" : "") + segundos;

    // Mostrar la hora en el elemento con id 'hora'
    document.getElementById("hora").innerHTML = horas + ":" + minutos + ":" + segundos + " PM";
}

// Llamar a la función actualizarHora cada segundo
setInterval(actualizarHora, 1000);

// Llamar a la función una vez para que se muestre la hora inmediatamente
actualizarHora();