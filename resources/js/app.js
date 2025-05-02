import './bootstrap';
import "./map.js";
import "./obras.js";
import "./incidentes.js";
const eliminar_incidente = document.getElementsByClassName("btn-eliminar-incidente");

for (let index = 0; index < eliminar_incidente.length; index++) {
    const element = eliminar_incidente[index];
    element.addEventListener("click", function(){
        document.getElementById("eliminar_incidente_id").value = element.dataset.incidente_id;
    })
    
}



