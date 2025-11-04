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
  "global": {
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
export const getTranslation = (
  translations: any,
  key: string
): string => {
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
 * Detect locale from URL query parameter
 */
export const detectLocale = (url: URL): Locale => {
  const lang = url.searchParams.get("lang");
  if (lang === "en") {
    return "en";
  }
  return "cs";
};

/**
 * Get localized path with query param
 */
export const getLocalizedPath = (path: string, locale: Locale): string => {
  const url = new URL(path, "http://localhost");
  if (locale === "en") {
    url.searchParams.set("lang", "en");
  } else {
    url.searchParams.delete("lang");
  }
  return url.pathname + url.search;
};

/**
 * Get alternate locale
 */
export const getAlternateLocale = (currentLocale: Locale): Locale => {
  return currentLocale === "cs" ? "en" : "cs";
};
