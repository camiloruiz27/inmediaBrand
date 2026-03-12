import { gsap, ScrollTrigger } from './motion/init-scrolltrigger';
import { initLenis } from './motion/init-lenis';
import { isReducedMotionPreferred, setReducedMotionClass } from './motion/reduced-motion';
import { initMenuTransition } from './motion/menu-transition';
import { initHeroAnimations } from './motion/hero-animations';
import { initHeroCinematic } from './motion/hero-cinematic';
import { initPageLoader } from './motion/page-loader';

document.documentElement.classList.add('js-enabled');

const runWhenIdle = (callback, timeout = 1200) => {
    if ('requestIdleCallback' in window) {
        window.requestIdleCallback(callback, { timeout });
        return;
    }

    window.setTimeout(callback, 1);
};

const initDeferredMotion = async ({ reducedMotion }) => {
    const [
        { initServicesTabs },
        { initMediaFirstSections },
        { initClientsLogos },
        { initPortfolioEffects },
        { initHorizontalParallax },
        { initCardStackSection },
        { initSectionRhythm },
        { initScrollReveals },
        { initMediaReveals },
        { initAdvancedParallax },
        { initParallaxEffects },
        { initHoverEffects },
        { initPortfolioCinematic },
        { initTextAnimations },
    ] = await Promise.all([
        import('./motion/services-tabs'),
        import('./motion/media-first-sections'),
        import('./motion/clients-logos'),
        import('./motion/portfolio-effects'),
        import('./motion/horizontal-parallax'),
        import('./motion/card-stack-section'),
        import('./motion/section-rhythm'),
        import('./motion/scroll-reveals'),
        import('./motion/media-reveals'),
        import('./motion/advanced-parallax'),
        import('./motion/parallax-effects'),
        import('./motion/hover-effects'),
        import('./motion/portfolio-cinematic'),
        import('./motion/text-animations'),
    ]);

    initServicesTabs({ gsap });
    initMediaFirstSections({ reducedMotion });
    initClientsLogos({ gsap, ScrollTrigger, reducedMotion });
    initPortfolioEffects({ reducedMotion });
    initHorizontalParallax({ gsap, ScrollTrigger, reducedMotion });
    initCardStackSection({ gsap, ScrollTrigger, reducedMotion });
    initSectionRhythm({ gsap, ScrollTrigger, reducedMotion });
    initScrollReveals({ gsap, ScrollTrigger, reducedMotion });
    initMediaReveals({ gsap, ScrollTrigger, reducedMotion });
    initAdvancedParallax({ gsap, ScrollTrigger, reducedMotion });
    initParallaxEffects({ gsap, ScrollTrigger, reducedMotion });
    initHoverEffects({ gsap, reducedMotion });
    initPortfolioCinematic({ gsap, ScrollTrigger, reducedMotion });
    initTextAnimations({ gsap, ScrollTrigger, reducedMotion });

    runWhenIdle(() => ScrollTrigger.refresh(), 1600);
};

const boot = () => {
    setReducedMotionClass();

    const reducedMotion = isReducedMotionPreferred();
    initPageLoader({ reducedMotion });

    initLenis({ reducedMotion, ScrollTrigger, gsap });
    initMenuTransition({ gsap, ScrollTrigger, reducedMotion });
    initHeroAnimations({ gsap, reducedMotion });
    initHeroCinematic({ gsap, ScrollTrigger, reducedMotion });
    runWhenIdle(() => {
        initDeferredMotion({ reducedMotion }).catch(() => null);
    }, 1200);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
} else {
    boot();
}
