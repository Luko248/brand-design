import { Loader } from "@googlemaps/js-api-loader";

const MAP_INIT_FLAG = "__brandDesignMapsInitialized";

const createInfoWindowContent = (addressLines: string[]) => {
  const content = document.createElement("div");
  content.style.display = "flex";
  content.style.flexDirection = "column";
  content.style.gap = "10px";
  content.style.minWidth = "200px";
  content.style.padding = "4px 2px";

  const logo = document.createElement("img");
  logo.src = "/images/logos/logo-dark.svg";
  logo.alt = "Brand Design";
  logo.style.width = "140px";
  logo.style.height = "auto";

  const address = document.createElement("address");
  address.style.fontStyle = "normal";
  address.style.margin = "0";
  address.style.lineHeight = "1.5";

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
    const loader = new Loader({
      apiKey,
      version: "weekly",
    });

    const [{ Map, InfoWindow }, { AdvancedMarkerElement }, { Geocoder }] =
      await Promise.all([
        loader.importLibrary("maps"),
        loader.importLibrary("marker"),
        loader.importLibrary("geocoding"),
      ]);

    let position = { ...fallbackPosition };

    try {
      const geocoder = new Geocoder();
      const { results } = await geocoder.geocode({ address: addressString });
      const geocoded = results?.[0]?.geometry?.location?.toJSON?.();

      if (geocoded) {
        position = geocoded;
      }
    } catch (geocodeError) {
      console.warn(
        "Google Maps: Geocoding failed, using fallback coordinates",
        geocodeError
      );
    }

    const map = new Map(container, {
      center: position,
      zoom: 15,
      disableDefaultUI: true,
      zoomControl: true,
      mapId,
    });

    const marker = new AdvancedMarkerElement({
      map,
      position,
      title: addressString || "Brand Design",
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
