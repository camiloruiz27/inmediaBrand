import './bootstrap';
import { gsap, ScrollTrigger } from './motion/init-scrolltrigger';
import { initLenis } from './motion/init-lenis';
import { isReducedMotionPreferred, setReducedMotionClass } from './motion/reduced-motion';
import { initMenuTransition } from './motion/menu-transition';
import { initHeroAnimations } from './motion/hero-animations';
import { initHeroCinematic } from './motion/hero-cinematic';
import { initScrollReveals } from './motion/scroll-reveals';
import { initParallaxEffects } from './motion/parallax-effects';
import { initAdvancedParallax } from './motion/advanced-parallax';
import { initMediaReveals } from './motion/media-reveals';
import { initSectionRhythm } from './motion/section-rhythm';
import { initHoverEffects } from './motion/hover-effects';
import { initPortfolioEffects } from './motion/portfolio-effects';
import { initPortfolioCinematic } from './motion/portfolio-cinematic';
import { initTextAnimations } from './motion/text-animations';
import { initServicesTabs } from './motion/services-tabs';
import { initHorizontalParallax } from './motion/horizontal-parallax';
import { initCardStackSection } from './motion/card-stack-section';
import { initMediaFirstSections } from './motion/media-first-sections';
import { initClientsLogos } from './motion/clients-logos';
import { initPageLoader } from './motion/page-loader';

document.documentElement.classList.add('js-enabled');

const boot = () => {
    setReducedMotionClass();

    const reducedMotion = isReducedMotionPreferred();
    initPageLoader({ reducedMotion });

    initLenis({ reducedMotion, ScrollTrigger, gsap });

    initServicesTabs({ gsap });
    initMediaFirstSections({ reducedMotion });
    initClientsLogos({ gsap, ScrollTrigger, reducedMotion });
    initPortfolioEffects({ reducedMotion });
    initHorizontalParallax({ gsap, ScrollTrigger, reducedMotion });
    initCardStackSection({ gsap, ScrollTrigger, reducedMotion });
    initMenuTransition({ gsap, ScrollTrigger, reducedMotion });
    initHeroAnimations({ gsap, reducedMotion });
    initHeroCinematic({ gsap, ScrollTrigger, reducedMotion });
    initSectionRhythm({ gsap, ScrollTrigger, reducedMotion });
    initScrollReveals({ gsap, ScrollTrigger, reducedMotion });
    initMediaReveals({ gsap, ScrollTrigger, reducedMotion });
    initAdvancedParallax({ gsap, ScrollTrigger, reducedMotion });
    initParallaxEffects({ gsap, ScrollTrigger, reducedMotion });
    initHoverEffects({ gsap, reducedMotion });
    initPortfolioCinematic({ gsap, ScrollTrigger, reducedMotion });
    initTextAnimations({ gsap, ScrollTrigger, reducedMotion });

    ScrollTrigger.refresh();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
} else {
    boot();
}
