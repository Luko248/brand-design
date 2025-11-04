# Brand Design Website - Astro 5.0

Modern, multilingual website built with Astro 5.0 framework.

## 🚀 Key Features

- **Astro 5.0** - Latest version with static site generation
- **i18n Support** - Czech (default) and English localization
- **TypeScript** - Full type safety throughout the project
- **SCSS** - Compiled stylesheets with modern CSS features
- **No jQuery** - All scripts rewritten in vanilla TypeScript
- **Google Maps Integration** - Custom styled map in footer

## 📁 Project Structure

```
/
├── public/              # Static assets (images, fonts, etc.)
│   └── Resources/       # Original resources folder
├── src/
│   ├── assets/          # Optimized assets
│   │   ├── images/      # Images processed by Astro
│   │   └── fonts/       # Web fonts
│   ├── components/      # Reusable Astro components
│   │   ├── Navigation.astro
│   │   └── Footer.astro
│   ├── layouts/         # Page layouts
│   │   └── BaseLayout.astro
│   ├── locales/         # Translation JSON files
│   │   ├── global.cs.json
│   │   ├── global.en.json
│   │   └── pages/       # Page-specific translations
│   ├── pages/           # File-based routing
│   │   ├── index.astro  # Czech homepage
│   │   └── en/          # English pages
│   ├── scripts/         # TypeScript modules
│   │   ├── main.ts
│   │   ├── navigation.ts
│   │   └── google-maps.ts
│   ├── styles/          # SCSS stylesheets
│   └── lib/             # Utility functions
│       └── i18n.ts      # Internationalization helpers
└── astro.config.mjs     # Astro configuration
```

## 🛠️ Development

```bash
# Install dependencies
npm install

# Start development server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview
```

## 🌐 Internationalization

The site supports two languages:
- **Czech (cs)** - Default locale, accessible at `/`
- **English (en)** - Accessible at `/en/`

Translations are stored in JSON files:
- `src/locales/global.{locale}.json` - Global content (nav, footer, company info)
- `src/locales/pages/{page}.{locale}.json` - Page-specific content

## 🎨 Styling

SCSS files are automatically compiled by Astro. The main entry point is:
```
src/styles/style.scss
```

All existing styles have been preserved and migrated from the original project.

## 📝 Notes

- **No Carousel**: The header slider has been replaced with a simple black background. You can add custom content or images as needed.
- **Google Maps**: Requires API key in `BaseLayout.astro`
- **Resources**: The original `/Resources` folder is copied to `/public/Resources` for backward compatibility with existing image paths.

## 🚢 Deployment

The site generates static HTML files. Deploy the `dist/` folder to any static hosting service:
- Netlify
- Vercel
- GitHub Pages
- Traditional web hosting

## 📦 Technology Stack

- Astro 5.0
- TypeScript 5.6
- Sass 1.80
- Google Maps API

## ⚙️ Configuration

Edit `astro.config.mjs` to customize:
- Site URL
- i18n settings
- Build options
- Vite configuration
