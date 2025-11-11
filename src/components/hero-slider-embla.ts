import EmblaCarousel, { type EmblaOptionsType, type EmblaCarouselType } from 'embla-carousel'
import Autoplay from 'embla-carousel-autoplay'

function readMsVar(name: string, fallbackMs = 4000): number {
  const v = getComputedStyle(document.documentElement).getPropertyValue(name).trim()
  if (!v) return fallbackMs
  // Expect format like "300ms" or "0.3s"
  if (v.endsWith('ms')) return parseFloat(v)
  if (v.endsWith('s')) return Math.round(parseFloat(v) * 1000)
  const n = Number(v)
  return Number.isFinite(n) ? n : fallbackMs
}

export function initHeroEmbla() {
  const viewport = document.getElementById('HeroEmbla') as HTMLElement | null
  if (!viewport) return

  const container = viewport.querySelector('[data-embla-container]') as HTMLElement | null
  if (!container) return

  const slides = Array.from(container.children) as HTMLElement[]
  const dots = Array.from(document.querySelectorAll('[data-embla-dot]')) as HTMLElement[]
  const prev = document.getElementById('HeroPrev') as HTMLButtonElement | null
  const next = document.getElementById('HeroNext') as HTMLButtonElement | null

  const delay = readMsVar('--duration-hero', 5000)

  const durationSteps = (() => {
    const raw = getComputedStyle(document.documentElement).getPropertyValue('--embla-duration').trim()
    const n = Number(raw)
    return Number.isFinite(n) ? n : 20
  })()
  const options: EmblaOptionsType = { loop: true, align: 'start', duration: durationSteps }
  const embla: EmblaCarouselType = EmblaCarousel(viewport, options, [
    Autoplay({ delay, stopOnInteraction: false, stopOnMouseEnter: true })
  ])

  function setActive(index: number) {
    slides.forEach((el, i) => el.setAttribute('data-active', String(i === index)))
    dots.forEach((el, i) => el.setAttribute('data-active', String(i === index)))
  }

  embla.on('select', () => setActive(embla.selectedScrollSnap()))
  setActive(embla.selectedScrollSnap())

  prev?.addEventListener('click', () => embla.scrollPrev())
  next?.addEventListener('click', () => embla.scrollNext())
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeroEmbla)
} else {
  initHeroEmbla()
}
