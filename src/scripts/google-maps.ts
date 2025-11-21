import { importLibrary, setOptions } from "@googlemaps/js-api-loader";

const MAP_INIT_FLAG = "__brandDesignMapsInitialized";

const createInfoWindowContent = (addressLines: string[]) => {
  const content = document.createElement("div");
  content.className = "brand-map-infowindow";

  const logo = document.createElement("img");
  logo.src = "/images/logos/logo-dark.svg";
  logo.alt = "Brand Design";
  logo.className = "brand-map-infowindow__logo";

  const address = document.createElement("address");
  address.className = "brand-map-infowindow__address";

  addressLines.forEach((line) => {
    const row = document.createElement("div");
    row.textContent = line;
    address.appendChild(row);
  });

  content.append(logo, address);
  return content;
};

const initMap = async (container: HTMLElement) => {
  if (typeof window === "undefined" || typeof document === "undefined") return;

  const apiKey = container.dataset.apiKey;
  if (!apiKey) {
    console.error(
      "Google Maps: Missing API Key. Please set PUBLIC_GOOGLE_MAPS_API_KEY or GOOGLE_MAPS_API_KEY in your .env file."
    );
    return;
  }

  const addressLines =
    container.dataset.addressLines?.split("|").filter(Boolean) ?? [];
  const addressString =
    container.dataset.addressString || addressLines.join(", ");

  const fallbackLat = Number(container.dataset.fallbackLat);
  const fallbackLng = Number(container.dataset.fallbackLng);
  const fallbackPosition = {
    lat: Number.isFinite(fallbackLat) ? fallbackLat : 0,
    lng: Number.isFinite(fallbackLng) ? fallbackLng : 0,
  };

  const mapId = container.dataset.mapId;

  try {
    setOptions({
      key: apiKey,
      v: "weekly",
      mapIds: mapId ? [mapId] : undefined,
    });

    const [{ Map, InfoWindow }, { AdvancedMarkerElement }] = await Promise.all([
      importLibrary("maps"),
      importLibrary("marker"),
    ]);

    const position = { ...fallbackPosition };

    const map = new Map(container, {
      center: position,
      zoom: 15,
      disableDefaultUI: true,
      zoomControl: false,
      mapTypeControl: false,
      streetViewControl: false,
      fullscreenControl: false,
      mapId,
    });

    const markerContent = document.createElement("img");
    markerContent.src = "/images/icons/marker.svg";
    markerContent.alt = "Brand Design Location";
    // Optional: Add a class for styling if needed, e.g. w-10 h-10 object-contain
    markerContent.className =
      "w-12 h-12 drop-shadow-lg cursor-pointer hover:scale-110 transition-transform duration-200";

    const marker = new AdvancedMarkerElement({
      map,
      position,
      title: addressString || "Brand Design",
      content: markerContent,
    });

    const infoWindow = new InfoWindow({
      content: createInfoWindowContent(addressLines),
      ariaLabel: addressString || "Brand Design",
    });

    marker.addListener("gmp-click", () => {
      infoWindow.open({
        anchor: marker,
        map,
      });
    });

    map.addListener("click", () => {
      infoWindow.close();
    });
  } catch (err) {
    console.error("Google Maps load failed:", err);
  }
};

const initMaps = () => {
  if (typeof window === "undefined" || typeof document === "undefined") return;

  if ((window as any)[MAP_INIT_FLAG]) {
    return;
  }
  (window as any)[MAP_INIT_FLAG] = true;

  const containers = Array.from(
    document.querySelectorAll<HTMLElement>("[data-map-container]")
  );

  containers.forEach((container) => {
    if (container instanceof HTMLElement) {
      initMap(container);
    }
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initMaps, { once: true });
} else {
  initMaps();
}
