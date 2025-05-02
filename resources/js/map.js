import 'ol/ol.css';
import { Map, View } from 'ol';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Style from 'ol/style/Style';
import Icon from 'ol/style/Icon';
import { fromLonLat } from 'ol/proj';

export function initMap(lat, lon) {
    const map = new Map({
        target: "map",
        layers: [
            new TileLayer({
                source: new OSM(),
            }),
        ],
        view: new View({
            center: fromLonLat([lon, lat]),
            zoom: 16,
        }),
    });

    const marker = new Feature({
        geometry: new Point(fromLonLat([lon, lat])),
    });

    marker.setStyle(
        new Style({
            image: new Icon({
                src: "/images/marker-icon.png",
                scale: 1,
            }),
        })
    );

    const vectorLayer = new VectorLayer({
        source: new VectorSource({
            features: [marker],
        }),
    });

    map.addLayer(vectorLayer);
}

document.addEventListener("DOMContentLoaded", function () {
    if(!document.getElementById("latitud_hidden") || !document.getElementById("longitud_hidden")){
        return;
    }
    const lat = document.getElementById("latitud_hidden").value || 19.551168;
    const lon = document.getElementById("longitud_hidden").value || -96.901805;

    initMap(parseFloat(lat), parseFloat(lon));
}); 