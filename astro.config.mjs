import { defineConfig } from "astro/config";

// https://astro.build/config
export default defineConfig({
  site: "https://luko248.github.io",
  base: "/brand-design/",
  output: "static",
  devToolbar: {
    enabled: false,
  },
  trailingSlash: "always",
});
