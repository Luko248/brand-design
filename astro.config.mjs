import { defineConfig } from "astro/config";

// https://astro.build/config
export default defineConfig({
  site: "https://brand-design.cz",
  output: "static",
  devToolbar: {
    enabled: false,
  },
});
