import Lenis from 'lenis';
import { q, qa, isTouchDevice } from './utils';

export const initLenis = ({ reducedMotion, ScrollTrigger, gsap }) => {
    const shouldDisable = reducedMotion || isTouchDevice();
    const header = q('#site-sticky-header');

    if (shouldDisable) {
        qa('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', (event) => {
                const targetId = anchor.getAttribute('href');
                if (!targetId || targetId === '#') return;

                const target = q(targetId);
                if (!target) return;

                event.preventDefault();
                const offset = header ? header.offsetHeight + 12 : 0;
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            });
        });

        return null;
    }

    const lenis = new Lenis({
        duration: 1.05,
        smoothWheel: true,
        wheelMultiplier: 0.95,
        touchMultiplier: 1,
        easing: (t) => 1 - (1 - t) ** 4,
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);

    qa('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            const targetId = anchor.getAttribute('href');
            if (!targetId || targetId === '#') return;

            const target = q(targetId);
            if (!target) return;

            event.preventDefault();
            lenis.scrollTo(target, {
                offset: -(header ? header.offsetHeight + 12 : 0),
                duration: 1.1,
            });
        });
    });

    let resizeTimer = null;
    window.addEventListener(
        'resize',
        () => {
            if (resizeTimer) window.clearTimeout(resizeTimer);
            resizeTimer = window.setTimeout(() => {
                lenis.resize();
                ScrollTrigger.refresh();
            }, 160);
        },
        { passive: true },
    );

    return lenis;
};
