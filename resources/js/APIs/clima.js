document.addEventListener("DOMContentLoaded", function () {
    if (!navigator.geolocation) {
        console.error(
            "La API de Geolocalización no está disponible en este navegador"
        );
        return;
    }

    navigator.geolocation.getCurrentPosition(success, error);

    function success(position) {
        // La función success se ejecuta si el usuario acepta compartir su ubicación.
        // La variable position contiene la información de la ubicación, incluyendo la latitud y la longitud.

        var latitud = position.coords.latitude;
        var longitud = position.coords.longitude;

        console.log("Latitud:", latitud);
        console.log("Longitud:", longitud);

        consultarClima(latitud, longitud);
    }

    function error(error) {
        // La función error se ejecuta si el usuario rechaza compartir su ubicación o si hay un error al obtener la ubicación.
        const contenedorClima = document.querySelector("#hora-clima");
        const clima = document.createElement("div");
        clima.classList.add("clima");
        clima.innerHTML = `
        
        `;
    
        contenedorClima.appendChild(clima);
    
        console.error("Error al obtener la ubicación:", error.message);
    }
});

function consultarClima(latitud, longitud) {
    var apiKey = "98162bf216454ad7aca9568b30ed028e";
    var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitud}&lon=${longitud}&appid=${apiKey}`;

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            const temp = parseInt(data.main.temp = data.main.temp - 273.15);
            const ciudad = data.name;
            console.log(ciudad);

            insertarClima(ciudad, temp);
        })
        .catch((error) => console.error(error));
}

function insertarClima(ciudad, temp) {
    const contenedorClima = document.querySelector("#hora-clima");
    const clima = document.createElement("div");
    clima.classList.add("clima");
    clima.innerHTML = `
    <div class="clima w-75 mx-3 ">
        <p class="grados">${temp}°</p>
        <p class="ciudad">${ciudad}</p>
    </div>
    `;

    contenedorClima.appendChild(clima);

}
