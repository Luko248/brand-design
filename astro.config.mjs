import { defineConfig } from "astro/config";

// https://astro.build/config
export default defineConfig({
  site: "https://brand-design.cz",
  base: "/",
  output: "static",
  devToolbar: {
    enabled: false,
  },
  trailingSlash: "always",
});
