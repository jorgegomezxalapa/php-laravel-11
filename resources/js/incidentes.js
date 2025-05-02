
document.addEventListener("DOMContentLoaded", function () {
    const formIncidentes = document.querySelector("#form-incidentes");
   
    if (!formIncidentes) return;

    formIncidentes.addEventListener("submit", function (event) {
       
        let inputs = formIncidentes.querySelectorAll("input[required], textarea[required]");
        let valido = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add("is-invalid"); // Agrega la clase para el mensaje en rojo
                valido = false;
            } else {
                input.classList.remove("is-invalid");
            }
        });

        if (!valido) {
            event.preventDefault(); // Previene la validación nativa del navegador
            formIncidentes.classList.add("was-validated"); // Activa la validación de Bootstrap
        }
    });
});