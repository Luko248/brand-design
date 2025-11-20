import { v2 as cloudinary } from "cloudinary";

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
const GALLERY_BASE_FOLDERS: Record<GalleryKey, string> = {
  printing: "BrandDesign/print-and-production",
  stickers: "BrandDesign/stickers",
  expositions: "BrandDesign/expositions",
};

function toSlug(value: string): string {
  return (
    value
      .toLowerCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-+|-+$/g, "") || "gallery"
  );
}

function configureCloudinary() {
  const cloudName = import.meta.env.CLOUDINARY_CLOUD_NAME;
  const apiKey = import.meta.env.CLOUDINARY_API_KEY;
  const apiSecret = import.meta.env.CLOUDINARY_API_SECRET;
  const url = import.meta.env.CLOUDINARY_URL;

  if (!(cloudName && apiKey && apiSecret) && !url) {
    console.warn(
      "Cloudinary: Missing CLOUDINARY_* configuration. Skipping Cloudinary integration."
    );
    return false;
  }

  try {
    cloudinary.config({
      cloud_name: cloudName,
      api_key: apiKey,
      api_secret: apiSecret,
      secure: true,
    });
    return true;
  } catch (err) {
    console.error("Cloudinary: Failed to configure SDK", err);
    return false;
  }
}

async function getCloudinaryData(
  gallery: GalleryKey
): Promise<CloudinaryGalleryData> {
  const configured = configureCloudinary();
  const baseFolder = GALLERY_BASE_FOLDERS[gallery];

  if (!configured || !baseFolder) {
    return {
      images: [],
      resources: [],
    };
  }

  try {
    const result = await cloudinary.search
      .expression(`folder:${baseFolder}/*`)
      .sort_by("public_id", "asc")
      .max_results(100)
      .execute();

    const resources = Array.isArray((result as any).resources)
      ? ((result as any).resources as any[])
      : [];

    // Group resources by their first-level subfolder under the base folder.
    const grouped = new Map<string, { title: string; resources: any[] }>();

    for (const resource of resources) {
      const folder: string = resource.folder || "";

      let relativeFolder = folder.startsWith(`${baseFolder}/`)
        ? folder.slice(baseFolder.length + 1)
        : folder;

      if (!relativeFolder) {
        relativeFolder = "Gallery";
      }

      const groupKey = relativeFolder.split("/")[0] || "Gallery";
      const title = groupKey.trim();

      if (!grouped.has(groupKey)) {
        grouped.set(groupKey, { title, resources: [] });
      }

      grouped.get(groupKey)!.resources.push(resource);
    }

    const baseOptions = {
      crop: "fill" as const,
      gravity: "auto" as const,
      fetch_format: "auto" as const,
      quality: "auto" as const,
      dpr: "auto" as const,
    };

    const images: CloudinaryGalleryImage[] = Array.from(grouped.values()).map(
      (group, index) => {
        const groupTitle = group.title || `Gallery ${index + 1}`;
        const groupId = `${gallery}-${toSlug(groupTitle)}`;
        const captionForIndex = (n: number) =>
          n === 1 ? groupTitle : `${groupTitle} (${n})`;

        const [first, ...rest] = group.resources;
        const firstPublicId: string = first.public_id;
        const firstWidth =
          typeof first?.width === "number" ? first.width : undefined;
        const firstHeight =
          typeof first?.height === "number" ? first.height : undefined;

        const thumb = cloudinary.url(firstPublicId, {
          ...baseOptions,
          width: 480,
        });

        const full = cloudinary.url(firstPublicId, {
          ...baseOptions,
          width: 1024,
        });

        const extraItems =
          rest.length > 0
            ? rest.map((res: any, idx: number) => {
                const extraPublicId: string = res.public_id;
                const extraWidth =
                  typeof res?.width === "number" ? res.width : undefined;
                const extraHeight =
                  typeof res?.height === "number" ? res.height : undefined;

                const caption = captionForIndex(idx + 2);

                return {
                  full: cloudinary.url(extraPublicId, {
                    ...baseOptions,
                    width: 1024,
                  }),
                  width: extraWidth,
                  height: extraHeight,
                  alt: caption,
                };
              })
            : undefined;

        const firstCaption = captionForIndex(1);

        return {
          thumb,
          full,
          width: firstWidth,
          height: firstHeight,
          alt: firstCaption,
          groupId,
          groupTitle,
          extraItems,
        };
      }
    );

    return {
      images,
      resources,
    };
  } catch (err) {
    console.error(`Cloudinary: Failed to fetch ${gallery} resources`, err);
    return {
      images: [],
      resources: [],
    };
  }
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
