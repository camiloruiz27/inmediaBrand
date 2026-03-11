import { q, qa, isTouchDevice, isDesktop, rafThrottle } from './utils';

export const initHoverEffects = ({ gsap, reducedMotion }) => {
    if (reducedMotion || isTouchDevice() || !isDesktop()) return;

    const liftItems = qa('[data-hover-lift]');
    liftItems.forEach((item) => {
        item.addEventListener('mouseenter', () => {
            gsap.to(item, { y: -4, duration: 0.28, ease: 'power2.out' });
        });
        item.addEventListener('mouseleave', () => {
            gsap.to(item, { y: 0, duration: 0.28, ease: 'power2.out' });
        });
    });

    const tiltItems = qa('[data-hover-tilt]').filter(
        (item) => !item.closest('[data-card-stack]') && !item.closest('[data-horizontal-track]'),
    );
    tiltItems.forEach((item) => {
        const move = rafThrottle((event) => {
            const rect = item.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - 0.5;
            const y = (event.clientY - rect.top) / rect.height - 0.5;
            gsap.to(item, {
                rotateX: y * -4,
                rotateY: x * 5,
                transformPerspective: 700,
                transformOrigin: 'center',
                duration: 0.28,
                ease: 'power2.out',
            });
        });

        item.addEventListener('mousemove', move);
        item.addEventListener('mouseleave', () => {
            gsap.to(item, { rotateX: 0, rotateY: 0, duration: 0.35, ease: 'power3.out' });
        });
    });

    const hero = q('[data-hero-section]');
    const spotlight = q('[data-hero-spotlight]');
    if (!hero || !spotlight) return;

    const updateSpotlight = rafThrottle((event) => {
        const rect = hero.getBoundingClientRect();
        const x = ((event.clientX - rect.left) / rect.width) * 100;
        const y = ((event.clientY - rect.top) / rect.height) * 100;
        hero.style.setProperty('--hero-mouse-x', `${x}%`);
        hero.style.setProperty('--hero-mouse-y', `${y}%`);
    });

    hero.addEventListener('mousemove', updateSpotlight);
    hero.addEventListener('mouseleave', () => {
        hero.style.setProperty('--hero-mouse-x', '50%');
        hero.style.setProperty('--hero-mouse-y', '40%');
    });
};
