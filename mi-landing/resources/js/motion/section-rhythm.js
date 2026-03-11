import { qa } from './utils';

const sectionRhythm = {
    hero: { y: 32, duration: 1, stagger: 0.09, ease: 'power3.out', start: 'top 86%' },
    editorial: { y: 26, duration: 0.95, stagger: 0.08, ease: 'power2.out', start: 'top 84%' },
    precise: { y: 18, duration: 0.72, stagger: 0.05, ease: 'power2.out', start: 'top 88%' },
    modular: { y: 24, duration: 0.82, stagger: 0.06, ease: 'power2.out', start: 'top 86%' },
    cinematic: { y: 34, duration: 1.02, stagger: 0.085, ease: 'power3.out', start: 'top 84%' },
    structured: { y: 20, duration: 0.78, stagger: 0.06, ease: 'power2.out', start: 'top 86%' },
    light: { y: 14, duration: 0.62, stagger: 0.04, ease: 'power1.out', start: 'top 89%' },
    emotional: { y: 30, duration: 1.1, stagger: 0.1, ease: 'power3.out', start: 'top 84%' },
};

export const initSectionRhythm = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const sections = qa('[data-motion-section][data-section-kind]');
    if (!sections.length) return;

    sections.forEach((section) => {
        const key = section.dataset.sectionKind || 'structured';
        const rhythm = sectionRhythm[key] ?? sectionRhythm.structured;
        const revealItems = qa('[data-reveal-item]:not([data-split])', section);
        if (!revealItems.length) return;
        if (key === 'hero') return;

        if (reducedMotion) {
            gsap.set(revealItems, { autoAlpha: 1, y: 0, clearProps: 'transform' });
            return;
        }

        gsap.fromTo(
            revealItems,
            { autoAlpha: 0, y: rhythm.y },
            {
                autoAlpha: 1,
                y: 0,
                duration: rhythm.duration,
                stagger: rhythm.stagger,
                ease: rhythm.ease,
                scrollTrigger: {
                    trigger: section,
                    start: rhythm.start,
                    toggleActions: 'play none none reverse',
                },
            },
        );

        if (key === 'cinematic' || key === 'emotional') {
            gsap.fromTo(
                section,
                { '--section-overlay-alpha': 0.24 },
                {
                    '--section-overlay-alpha': 0.08,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 0.5,
                    },
                },
            );
        }
    });
};
