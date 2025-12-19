import globalCs from "../locales/global.cs.json";
import globalEn from "../locales/global.en.json";
import indexCs from "../locales/pages/index.cs.json";
import indexEn from "../locales/pages/index.en.json";
import expositionsCs from "../locales/pages/expositions.cs.json";
import expositionsEn from "../locales/pages/expositions.en.json";
import sticksCs from "../locales/pages/sticks.cs.json";
import sticksEn from "../locales/pages/sticks.en.json";
import printingCs from "../locales/pages/printing.cs.json";
import printingEn from "../locales/pages/printing.en.json";

type Locale = "cs" | "en";

const translations: Record<string, Record<Locale, any>> = {
  global: {
    cs: globalCs,
    en: globalEn,
  },
  "pages/index": {
    cs: indexCs,
    en: indexEn,
  },
  "pages/expositions": {
    cs: expositionsCs,
    en: expositionsEn,
  },
  "pages/sticks": {
    cs: sticksCs,
    en: sticksEn,
  },
  "pages/printing": {
    cs: printingCs,
    en: printingEn,
  },
};

/**
 * Load translations for a specific locale and file
 */
export const loadTranslations = async (
  locale: Locale,
  file: string
): Promise<any> => {
  try {
    const translation = translations[file]?.[locale];
    if (!translation) {
      console.error(`Translation not found for ${file}.${locale}`);
      return {};
    }
    return translation;
  } catch (error) {
    console.error(`Failed to load translations for ${file}.${locale}`, error);
    return {};
  }
};

/**
 * Get nested translation value by dot notation key
 */
export const getTranslation = (translations: any, key: string): string => {
  const keys = key.split(".");
  let value: any = translations;

  for (const k of keys) {
    if (typeof value === "object" && k in value) {
      value = value[k];
    } else {
      return key;
    }
  }

  return typeof value === "string" ? value : key;
};

/**
 * Detect locale from URL
 */
export const detectLocale = (url: URL): Locale => {
  const pathname = url.pathname;
  // Check for /en or /en/ prefix
  if (pathname === "/en" || pathname.startsWith("/en/")) {
    return "en";
  }
  const lang = url.searchParams.get("lang");
  if (lang === "en") {
    return "en";
  }
  return "cs";
};

/**
 * Get localized path
 * Converts path to localized path:
 * - If locale is 'cs': return /path
 * - If locale is 'en': return /en/path
 * Automatically prepends Astro's base path
 */
export const getLocalizedPath = (path: string, locale: Locale): string => {
  const baseUrl = import.meta.env.BASE_URL;
  const base = baseUrl.endsWith("/") ? baseUrl.slice(0, -1) : baseUrl;

  // Ensure path starts with /
  let cleanPath = path.startsWith("/") ? path : "/" + path;

  // Strip base path if present (to avoid duplication)
  if (cleanPath.startsWith(base)) {
    cleanPath = cleanPath.slice(base.length);
    // Ensure it still starts with /
    if (!cleanPath.startsWith("/")) cleanPath = "/" + cleanPath;
  }

  // Strip existing locale prefix if present
  const pathWithoutLocale = cleanPath
    .replace(/^\/en\//, "/")
    .replace(/^\/en$/, "/");

  if (locale === "en") {
    // Avoid double slash
    if (pathWithoutLocale === "/") return `${base}/en/`;
    return `${base}/en${pathWithoutLocale}`;
  }

  // For default locale (cs)
  if (pathWithoutLocale === "/") return `${base}/`;
  return `${base}${pathWithoutLocale}`;
};

/**
 * Get alternate locale
 */
export const getAlternateLocale = (currentLocale: Locale): Locale => {
  return currentLocale === "cs" ? "en" : "cs";
};
