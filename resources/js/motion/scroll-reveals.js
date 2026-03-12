import { qa } from './utils';

const revealConfig = {
    start: 'top 84%',
    toggleActions: 'play none none reverse',
};

export const initScrollReveals = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const sections = qa('[data-motion-section]:not([data-section-kind])');
    if (!sections.length) return;

    sections.forEach((section) => {
        const revealItems = qa('[data-reveal-item]:not([data-split])', section);
        if (!revealItems.length) return;

        if (reducedMotion) {
            gsap.set(revealItems, { autoAlpha: 1, y: 0, clearProps: 'transform' });
            return;
        }

        gsap.fromTo(
            revealItems,
            { autoAlpha: 0, y: 26 },
            {
                autoAlpha: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out',
                stagger: 0.07,
                scrollTrigger: {
                    trigger: section,
                    ...revealConfig,
                },
            },
        );
    });

    const clientsGrid = qa('[data-clients-grid]');
    clientsGrid.forEach((grid) => {
        const logos = qa('[data-reveal-item]', grid);
        if (!logos.length || reducedMotion) return;

        gsap.fromTo(
            logos,
            { autoAlpha: 0, y: 18 },
            {
                autoAlpha: 1,
                y: 0,
                duration: 0.55,
                stagger: 0.06,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 88%',
                },
            },
        );
    });
};
