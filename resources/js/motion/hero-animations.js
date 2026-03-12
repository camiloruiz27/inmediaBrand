import { q, qa } from './utils';

export const initHeroAnimations = ({ gsap, reducedMotion }) => {
    const hero = q('[data-hero-section]');
    if (!hero) return;

    const introItems = qa('[data-reveal-item]', hero);
    const heroMedia = q('[data-hero-media]', hero);

    if (reducedMotion) {
        gsap.set(introItems, { clearProps: 'all' });
        if (heroMedia) gsap.set(heroMedia, { clearProps: 'all' });
        return;
    }

    const timeline = gsap.timeline({ defaults: { ease: 'power2.out' } });
    timeline.fromTo(hero, { autoAlpha: 0.6 }, { autoAlpha: 1, duration: 0.4 });

    if (introItems.length) {
        timeline.fromTo(
            introItems,
            { autoAlpha: 0, y: 22 },
            { autoAlpha: 1, y: 0, duration: 0.8, stagger: 0.08 },
            0.1,
        );
    }

    if (heroMedia) {
        timeline.fromTo(
            heroMedia,
            { autoAlpha: 0, y: 28, scale: 0.97 },
            { autoAlpha: 1, y: 0, scale: 1, duration: 1 },
            0.18,
        );
    }
};
