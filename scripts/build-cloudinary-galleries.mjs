#!/usr/bin/env node

import { v2 as cloudinary } from "cloudinary";
import { mkdir, writeFile } from "node:fs/promises";
import path from "node:path";

const GALLERY_BASE_FOLDERS = {
  printing: "BrandDesign/print-and-production",
  stickers: "BrandDesign/stickers",
  expositions: "BrandDesign/expositions",
};

function toSlug(value) {
  return (
    value
      .toLowerCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-+|-+$/g, "") || "gallery"
  );
}

function summarizeResource(resource) {
  if (!resource) return null;

  return {
    public_id: resource.public_id,
    folder: resource.folder,
    width: resource.width,
    height: resource.height,
    format: resource.format,
    created_at: resource.created_at,
  };
}

async function searchAllResources(baseFolder) {
  const all = [];
  let nextCursor;

  do {
    const query = cloudinary.search
      .expression(`folder:${baseFolder}/*`)
      .sort_by("public_id", "asc")
      .max_results(500);

    if (nextCursor) {
      query.next_cursor(nextCursor);
    }

    const result = await query.execute();

    const resources = Array.isArray(result?.resources) ? result.resources : [];
    all.push(...resources);

    nextCursor = result?.next_cursor;
  } while (nextCursor);

  return all;
}

function buildImages({ galleryKey, baseFolder, resources }) {
  const grouped = new Map();

  for (const resource of resources) {
    const folder = resource.folder || "";

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

    grouped.get(groupKey).resources.push(resource);
  }

  const baseOptions = {
    crop: "fill",
    gravity: "auto",
    fetch_format: "auto",
    quality: "auto",
    dpr: "auto",
  };

  return Array.from(grouped.values()).map((group, index) => {
    const groupTitle = group.title || `Gallery ${index + 1}`;
    const groupId = `${galleryKey}-${toSlug(groupTitle)}`;
    const captionForIndex = (n) => (n === 1 ? groupTitle : `${groupTitle} (${n})`);

    const [first, ...rest] = group.resources;
    if (!first?.public_id) return null;

    const firstPublicId = first.public_id;

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
        ? rest
            .map((res, idx) => {
              if (!res?.public_id) return null;
              const extraPublicId = res.public_id;
              const caption = captionForIndex(idx + 2);

              return {
                full: cloudinary.url(extraPublicId, {
                  ...baseOptions,
                  width: 1024,
                }),
                width: typeof res?.width === "number" ? res.width : undefined,
                height: typeof res?.height === "number" ? res.height : undefined,
                alt: caption,
              };
            })
            .filter(Boolean)
        : undefined;

    const firstCaption = captionForIndex(1);

    return {
      thumb,
      full,
      width: typeof first?.width === "number" ? first.width : undefined,
      height: typeof first?.height === "number" ? first.height : undefined,
      alt: firstCaption,
      groupId,
      groupTitle,
      extraItems,
    };
  });
}

async function main() {
  if (!process.env.CLOUDINARY_URL) {
    console.error(
      "Missing CLOUDINARY_URL. Expected format: cloudinary://API_KEY:API_SECRET@CLOUD_NAME"
    );
    process.exit(1);
  }

  cloudinary.config({
    secure: true,
  });

  const galleries = {};

  for (const [galleryKey, baseFolder] of Object.entries(GALLERY_BASE_FOLDERS)) {
    const resources = await searchAllResources(baseFolder);

    const images = buildImages({ galleryKey, baseFolder, resources }).filter(Boolean);

    galleries[galleryKey] = {
      images,
      resources: resources.map(summarizeResource).filter(Boolean),
    };

    console.log(
      `Built gallery '${galleryKey}': ${images.length} groups, ${resources.length} resources`
    );
  }

  const output = {
    generatedAt: new Date().toISOString(),
    ...galleries,
  };

  const outDir = path.join(process.cwd(), "public", "data");
  const outFile = path.join(outDir, "galleries.json");

  await mkdir(outDir, { recursive: true });
  await writeFile(outFile, JSON.stringify(output, null, 2) + "\n", "utf8");

  console.log(`Wrote ${outFile}`);
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
