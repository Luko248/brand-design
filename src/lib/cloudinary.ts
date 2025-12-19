export type CloudinaryGalleryImage = {
  thumb: string;
  full: string;
  width?: number;
  height?: number;
  alt?: string;
  groupId?: string;
  groupTitle?: string;
  extraItems?: Array<{
    full: string;
    width?: number;
    height?: number;
    alt?: string;
  }>;
};

export type CloudinaryPrintingData = {
  images: CloudinaryGalleryImage[];
  resources: any[];
};

export type CloudinaryGalleryData = CloudinaryPrintingData;

type GalleryKey = "printing" | "stickers" | "expositions";
type GalleriesJson = {
  generatedAt?: string;
} & Record<GalleryKey, CloudinaryGalleryData>;

const GALLERIES_URL = `${import.meta.env.BASE_URL || "/"}data/galleries.json`;
const GALLERIES_FILE = "public/data/galleries.json";

function emptyGallery(): CloudinaryGalleryData {
  return { images: [], resources: [] };
}

async function loadAllGalleries(): Promise<GalleriesJson | null> {
  try {
    // Browser runtime: fetch from the generated JSON in /public.
    if (typeof window !== "undefined") {
      const res = await fetch(GALLERIES_URL, { cache: "force-cache" });
      if (!res.ok) return null;
      return (await res.json()) as GalleriesJson;
    }

    // Build/SSR runtime (GitHub Actions / local build): read from filesystem.
    const { readFile } = await import("node:fs/promises");
    const { resolve } = await import("node:path");

    const raw = await readFile(resolve(process.cwd(), GALLERIES_FILE), "utf8");
    return JSON.parse(raw) as GalleriesJson;
  } catch {
    return null;
  }
}

let galleriesCache: Promise<GalleriesJson | null> | null = null;

function getGalleriesCached(): Promise<GalleriesJson | null> {
  galleriesCache ??= loadAllGalleries();
  return galleriesCache;
}

async function getCloudinaryData(gallery: GalleryKey): Promise<CloudinaryGalleryData> {
  const all = await getGalleriesCached();
  return all?.[gallery] ?? emptyGallery();
}

export async function getPrintingCloudinaryData(): Promise<CloudinaryGalleryData> {
  return getCloudinaryData("printing");
}

export async function getStickersCloudinaryData(): Promise<CloudinaryGalleryData> {
  return getCloudinaryData("stickers");
}

export async function getExpositionsCloudinaryData(): Promise<CloudinaryGalleryData> {
  return getCloudinaryData("expositions");
}
