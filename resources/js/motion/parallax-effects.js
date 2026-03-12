import { qa, isTouchDevice } from './utils';

export const initParallaxEffects = ({ gsap, ScrollTrigger, reducedMotion }) => {
    if (reducedMotion || isTouchDevice()) return;

    const parallaxElements = qa('[data-parallax]:not([data-layer])');
    if (!parallaxElements.length) return;

    parallaxElements.forEach((element) => {
        const yValue = Number(element.dataset.parallaxY || 14);

        gsap.to(element, {
            y: yValue,
            ease: 'none',
            scrollTrigger: {
                trigger: element.closest('section') ?? element,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 0.5,
            },
        });
    });
};
