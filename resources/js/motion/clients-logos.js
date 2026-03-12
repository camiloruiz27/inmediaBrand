import { q, qa } from './utils';

export const initClientsLogos = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const logos = qa('[data-clients-logo]');
    if (!logos.length) return;

    if (!reducedMotion) {
        gsap.fromTo(
            logos,
            { autoAlpha: 0, y: 14 },
            {
                autoAlpha: 1,
                y: 0,
                duration: 0.55,
                stagger: 0.03,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: q('#clientes'),
                    start: 'top 82%',
                },
            },
        );
    }

    const marqueeTrack = q('[data-clients-track]');
    const marqueeWrap = q('[data-clients-marquee]');
    if (!marqueeTrack || !marqueeWrap || reducedMotion) return;

    const travel = () => Math.max(0, marqueeTrack.scrollWidth * 0.5);
    if (travel() <= 0) return;

    const tween = gsap.to(marqueeTrack, {
        x: () => -travel(),
        duration: 36,
        ease: 'none',
        repeat: -1,
    });

    marqueeWrap.addEventListener('mouseenter', () => tween.pause());
    marqueeWrap.addEventListener('mouseleave', () => tween.resume());
};
