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
                    y: index * 32,
                    scale: 1 - index * 0.024,
                    autoAlpha: 1,
                    zIndex: cards.length - index,
                    transformOrigin: '50% 0%',
                    force3D: true,
                });
            });
        };

        setInitial();

        if (reducedMotion) return;

        const timeline = gsap.timeline({
            defaults: { ease: 'none' },
            scrollTrigger: {
                trigger: wrap,
                pin: stack,
                start: 'top top+=100',
                end: () => `+=${window.innerHeight * (cards.length - 0.15)}`,
                scrub: 0.6,
                invalidateOnRefresh: true,
                anticipatePin: 1,
                fastScrollEnd: true,
            },
        });

        cards.forEach((card, index) => {
            if (index === 0) return;

            const previous = cards[index - 1];
            const at = index - 1;

            timeline.to(
                previous,
                {
                    y: -95 - index * 14,
                    scale: 0.88 - index * 0.018,
                    autoAlpha: 0.34,
                    duration: 1,
                },
                at,
            );

            timeline.fromTo(
                card,
                {
                    y: 86,
                    scale: 0.95,
                    autoAlpha: 0.56,
                },
                {
                    y: index * 8,
                    scale: 1,
                    autoAlpha: 1,
                    duration: 1,
                },
                at,
            );
        });

        return () => {
            timeline.scrollTrigger?.kill();
            timeline.kill();
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
