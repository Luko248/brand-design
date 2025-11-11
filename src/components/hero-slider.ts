export function initHeroSlider() {
  const root = document.getElementById('HeroSlider');
  if (!root) return;

  const slides = Array.from(root.querySelectorAll('[data-slide]')) as HTMLElement[];
  const dots = Array.from(document.querySelectorAll('[data-dot]')) as HTMLElement[];
  const prev = document.getElementById('HeroPrev') as HTMLButtonElement | null;
  const next = document.getElementById('HeroNext') as HTMLButtonElement | null;
  let index = 0;
  let timer: number | undefined;
  const duration = 5000;

  function setActive(i: number) {
    index = (i + slides.length) % slides.length;
    slides.forEach((el, j) => el.setAttribute('data-active', String(j === index)));
    dots.forEach((el, j) => el.setAttribute('data-active', String(j === index)));
  }

  function start() {
    stop();
    timer = window.setInterval(() => setActive(index + 1), duration);
  }
  function stop() {
    if (timer) window.clearInterval(timer);
    timer = undefined;
  }

  next?.addEventListener('click', () => { setActive(index + 1); start(); });
  prev?.addEventListener('click', () => { setActive(index - 1); start(); });
  dots.forEach((btn, i) => btn.addEventListener('click', () => { setActive(i); start(); }));

  root.addEventListener('mouseenter', stop);
  root.addEventListener('mouseleave', start);
  setActive(0);
  start();
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeroSlider);
} else {
  initHeroSlider();
}

