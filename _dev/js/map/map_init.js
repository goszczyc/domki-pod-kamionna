import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { GestureHandling } from "leaflet-gesture-handling";

const contactMap = () => {
  L.Map.addInitHook("addHandler", "gestureHandling", GestureHandling);

  let tilesLayer = L.tileLayer(
    "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
      attribution:
        "Tiles by <a href='https://www.openstreetmap.org'>© OpenStreetMap</a>",
    }
  );

  const locMap = L.map("map", {
    zoomControl: true,
    layers: [tilesLayer],
    maxZoom: 18,
    minZoom: 12,
    scrollWheelZoom: false,
    gestureHandling: true
  }).setView([49.781373, 20.408451], 13);

  const mainLocIcon = L.icon({
    iconUrl: adminUrl.template_directory+'/dist/images/pin.png',
    iconSize: [34, 50],
    iconAnchor: [17, 25],
  });

  L.marker([49.781373, 20.408451], {icon: mainLocIcon}).addTo(locMap);
};

export default contactMap;
