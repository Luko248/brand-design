import { v2 as cloudinary } from "cloudinary";

export type CloudinaryGalleryImage = {
  thumb: string;
  full: string;
  alt?: string;
  groupId?: string;
  groupTitle?: string;
  extraItems?: Array<{
    full: string;
    alt?: string;
  }>;
};

export type CloudinaryPrintingData = {
  images: CloudinaryGalleryImage[];
  resources: any[];
};

// Main Cloudinary folder for printing galleries
const PRINTING_BASE_FOLDER = "BrandDesign/print-and-production";

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

function altFromFilename(publicId: string): string | undefined {
  const filename = publicId.split("/").pop();
  if (!filename) return undefined;

  return filename
    .replace(/\.[a-z0-9]+$/i, "")
    .replace(/[_-]+/g, " ")
    .trim();
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

export async function getPrintingCloudinaryData(): Promise<CloudinaryPrintingData> {
  const configured = configureCloudinary();

  if (!configured) {
    return {
      images: [],
      resources: [],
    };
  }

  try {
    const result = await cloudinary.search
      // Images are stored in BrandDesign/print-and-production and its subfolders
      .expression(`folder:${PRINTING_BASE_FOLDER}/*`)
      .sort_by("public_id", "asc")
      .max_results(100)
      .execute();

    const resources = Array.isArray((result as any).resources)
      ? ((result as any).resources as any[])
      : [];

    // Group resources by their first-level subfolder under the printing base folder.
    const grouped = new Map<string, { title: string; resources: any[] }>();

    for (const resource of resources) {
      const folder: string = resource.folder || "";

      let relativeFolder = folder.startsWith(`${PRINTING_BASE_FOLDER}/`)
        ? folder.slice(PRINTING_BASE_FOLDER.length + 1)
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
        const groupId = `printing-${toSlug(groupTitle)}`;

        const [first, ...rest] = group.resources;
        const firstPublicId: string = first.public_id;

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
            ? rest.map((res: any) => {
                const extraPublicId: string = res.public_id;

                return {
                  full: cloudinary.url(extraPublicId, {
                    ...baseOptions,
                    width: 1024,
                  }),
                  alt: altFromFilename(extraPublicId),
                };
              })
            : undefined;

        return {
          thumb,
          full,
          alt: groupTitle,
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
    console.error("Cloudinary: Failed to fetch printing resources", err);
    return {
      images: [],
      resources: [],
    };
  }
}
