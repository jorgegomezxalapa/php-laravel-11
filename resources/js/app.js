import './bootstrap';

import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Style from 'ol/style/Style';
import Icon from 'ol/style/Icon';

// Coordenadas del marcador
const lon = -96.901805; // Longitud primero
const lat = 19.551168; // Latitud después

// Crear el mapa
const map = new Map({
    target: 'map',
    layers: [
        new TileLayer({
            source: new OSM(),
        }),
    ],
    view: new View({
        center: [lon, lat], // OpenLayers usa [longitud, latitud]
        zoom: 16,
        projection: 'EPSG:4326',
    }),
});

// Crear un marcador con coordenadas correctas
const marker = new Feature({
    geometry: new Point([lon, lat]),
});

// Aplicar un ícono personalizado al marcador
const markerStyle = new Style({
    image: new Icon({
        src: '/images/marker-icon.png', // Icono rojo visible
        scale: 1, // Aumenta el tamaño
    }),
});

marker.setStyle(markerStyle);

// Agregar el marcador a la capa de vectores y al mapa
const vectorLayer = new VectorLayer({
    source: new VectorSource({
        features: [marker],
    }),
});

map.addLayer(vectorLayer);

const eliminar_incidente = document.getElementsByClassName("btn-eliminar-incidente");

for (let index = 0; index < eliminar_incidente.length; index++) {
    const element = eliminar_incidente[index];
    element.addEventListener("click", function(){
        document.getElementById("eliminar_incidente_id").value = element.dataset.incidente_id;
    })
    
}



