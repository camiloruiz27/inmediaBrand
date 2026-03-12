import { q, qa, isDesktop, rafThrottle } from './utils';

export const initHeroCinematic = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const hero = q('[data-hero-section]');
    const heroMedia = q('[data-hero-media]');
    const heroLayers = qa('[data-hero-bg] [data-layer]');
    if (!hero || !heroMedia) return;

    if (reducedMotion) {
        gsap.set([heroMedia, ...heroLayers], { clearProps: 'all' });
        return;
    }

    gsap.fromTo(
        heroMedia,
        {
            autoAlpha: 0,
            scale: 1.12,
            yPercent: 6,
            clipPath: 'inset(12% 8% 10% 8% round 1.5rem)',
        },
        {
            autoAlpha: 1,
            scale: 1,
            yPercent: 0,
            clipPath: 'inset(0% 0% 0% 0% round 1.5rem)',
            duration: 1.4,
            ease: 'power3.out',
            delay: 0.15,
        },
    );

    if (heroLayers.length) {
        gsap.fromTo(
            heroLayers,
            { autoAlpha: 0, scale: 1.08 },
            { autoAlpha: 1, scale: 1, duration: 1.6, stagger: 0.08, ease: 'power2.out' },
        );
    }

    ScrollTrigger.create({
        trigger: hero,
        start: 'top top',
        end: 'bottom top',
        scrub: 0.45,
        onUpdate: (self) => {
            const p = self.progress;
            gsap.to(heroMedia, { yPercent: p * 8, scale: 1 - p * 0.03, duration: 0.25, overwrite: true });
        },
    });

    if (isDesktop()) {
        const handleMove = rafThrottle((event) => {
            const rect = hero.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - 0.5;
            const y = (event.clientY - rect.top) / rect.height - 0.5;

            gsap.to(heroMedia, {
                x: x * 10,
                y: y * 8,
                duration: 0.65,
                ease: 'power3.out',
                overwrite: true,
            });
        });

        hero.addEventListener('mousemove', handleMove);
        hero.addEventListener('mouseleave', () => {
            gsap.to(heroMedia, { x: 0, y: 0, duration: 0.7, ease: 'power3.out' });
        });
    }
};
