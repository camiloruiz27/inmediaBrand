import { qa, isTouchDevice } from './utils';

const layerIntensity = {
    bg: 0.85,
    media: 1.2,
    accent: 1.55,
    text: 0.35,
};

export const initAdvancedParallax = ({ gsap, ScrollTrigger, reducedMotion }) => {
    if (reducedMotion || isTouchDevice()) return;

    const layers = qa('[data-parallax]');
    if (!layers.length) return;

    const mm = gsap.matchMedia();

    mm.add(
        {
            desktop: '(min-width: 1024px)',
            tablet: '(min-width: 768px) and (max-width: 1023px)',
            mobile: '(max-width: 767px)',
        },
        (context) => {
            const { desktop, tablet } = context.conditions;
            const baseMultiplier = desktop ? 1 : tablet ? 0.65 : 0.38;

            layers.forEach((layer) => {
                const layerType = layer.dataset.layer ?? 'media';
                const factor = layerIntensity[layerType] ?? 1;
                const configuredY = Number(layer.dataset.parallaxY || 14);
                const yDistance = configuredY * factor * baseMultiplier;

                gsap.to(layer, {
                    y: yDistance,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: layer.closest('section') ?? layer,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: desktop ? 0.6 : 0.4,
                        invalidateOnRefresh: true,
                    },
                });
            });
        },
    );
};
