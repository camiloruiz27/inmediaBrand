import { q } from './utils';

export const initCardStackSection = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const wrap = q('[data-card-stack-wrap]');
    const stack = q('[data-card-stack]', wrap);
    if (!wrap || !stack) return;

    const cards = gsap.utils.toArray('[data-stack-card]', stack);
    if (cards.length < 2) return;

    const mm = gsap.matchMedia();

    mm.add('(min-width: 1024px)', () => {
        const setInitial = () => {
            cards.forEach((card, index) => {
                gsap.set(card, {
                    y: index === 0 ? 0 : 34,
                    scale: index === 0 ? 1 : 0.96,
                    autoAlpha: index === 0 ? 1 : 0.94,
                    zIndex: index + 1,
                    transformOrigin: '50% 8%',
                    force3D: true,
                });
            });
        };

        setInitial();

        if (reducedMotion) return () => cards.forEach((card) => gsap.set(card, { clearProps: 'all' }));

        const triggers = cards
            .map((card, index) => {
                if (index === 0) return null;

                const previous = cards[index - 1];

                return ScrollTrigger.create({
                    trigger: card,
                    start: 'top 78%',
                    end: 'top 32%',
                    scrub: 0.7,
                    invalidateOnRefresh: true,
                    onUpdate: ({ progress }) => {
                        gsap.to(previous, {
                            y: -74 * progress,
                            scale: 1 - 0.09 * progress,
                            autoAlpha: 1 - 0.76 * progress,
                            duration: 0.12,
                            overwrite: true,
                        });

                        gsap.to(card, {
                            y: 34 * (1 - progress),
                            scale: 0.96 + 0.04 * progress,
                            autoAlpha: 0.94 + 0.06 * progress,
                            duration: 0.12,
                            overwrite: true,
                        });
                    },
                });
            })
            .filter(Boolean);

        return () => {
            triggers.forEach((trigger) => trigger.kill());
            cards.forEach((card) => gsap.set(card, { clearProps: 'all' }));
            gsap.set(stack, { clearProps: 'all' });
        };
    });

    mm.add('(max-width: 1023px)', () => {
        cards.forEach((card, index) => {
            gsap.set(card, {
                clearProps: 'all',
                marginTop: index === 0 ? 0 : '-1rem',
            });
        });
    });
};
