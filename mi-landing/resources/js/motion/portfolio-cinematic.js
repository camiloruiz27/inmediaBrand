import { q, qa, isDesktop } from './utils';

export const initPortfolioCinematic = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const section = q('[data-portfolio-section]');
    const items = qa('[data-portfolio-item]', section);
    if (!section || !items.length || reducedMotion) return;

    const track = q('[data-portfolio-track]', section);
    if (!track) return;

    gsap.fromTo(
        section,
        { '--portfolio-glow': 0.04 },
        {
            '--portfolio-glow': 0.18,
            ease: 'none',
            scrollTrigger: {
                trigger: section,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 0.45,
            },
        },
    );

    items.forEach((item, index) => {
        const mediaLayer = q('[data-layer="media"]', item);
        const overlay = q('[data-media-overlay]', item);
        const content = q('.space-y-3', item);

        gsap.fromTo(
            item,
            { autoAlpha: 0, y: 32, scale: 0.985 },
            {
                autoAlpha: 1,
                y: 0,
                scale: 1,
                duration: 0.9,
                ease: 'power3.out',
                delay: index * 0.03,
                scrollTrigger: {
                    trigger: item,
                    start: 'left 92%',
                    horizontal: true,
                    scroller: track,
                },
            },
        );

        if (mediaLayer) {
            gsap.to(mediaLayer, {
                scale: 1.08,
                xPercent: index % 2 === 0 ? 2.5 : -2.5,
                ease: 'none',
                scrollTrigger: {
                    trigger: item,
                    start: 'left 95%',
                    end: 'right 8%',
                    horizontal: true,
                    scroller: track,
                    scrub: 0.55,
                },
            });
        }

        if (!isDesktop() || !overlay || !content) return;

        item.addEventListener('mouseenter', () => {
            gsap.to(overlay, { autoAlpha: 1, duration: 0.35, ease: 'power2.out' });
            gsap.to(content, { y: -4, duration: 0.35, ease: 'power2.out' });
        });

        item.addEventListener('mouseleave', () => {
            gsap.to(overlay, { autoAlpha: 0.72, duration: 0.4, ease: 'power2.out' });
            gsap.to(content, { y: 0, duration: 0.35, ease: 'power2.out' });
        });
    });
};
