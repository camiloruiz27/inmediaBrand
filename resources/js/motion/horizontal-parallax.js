import { q } from './utils';

export const initHorizontalParallax = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const stage = q('[data-horizontal-parallax]');
    const sticky = q('[data-horizontal-sticky]', stage);
    const wrap = q('[data-horizontal-pin]', stage);
    const track = q('[data-horizontal-track]', stage);
    if (!stage || !sticky || !wrap || !track) return;

    const items = gsap.utils.toArray('[data-horizontal-item]', track);
    const mm = gsap.matchMedia();

    mm.add('(min-width: 1024px)', () => {
        if (reducedMotion) {
            gsap.set(track, { clearProps: 'all' });
            stage.style.removeProperty('min-height');
            stage.style.removeProperty('--horizontal-sticky-top');
            return;
        }

        let distance = 0;
        let stickyTop = 72;
        let stickyHeight = 0;

        const measure = () => {
            const header = q('#site-sticky-header');
            stickyTop = (header?.offsetHeight || 60) + 12;
            stickyHeight = Math.max(420, window.innerHeight - stickyTop);
            distance = Math.max(0, track.scrollWidth - wrap.clientWidth);

            stage.style.setProperty('--horizontal-sticky-top', `${stickyTop}px`);
            stage.style.minHeight = `${Math.round(stickyHeight + distance)}px`;
        };

        const onRefreshInit = () => {
            measure();
        };

        measure();
        if (distance <= 0) return;

        gsap.set(track, { x: 0, force3D: true, willChange: 'transform' });

        const travelTween = gsap.to(track, {
            x: () => -distance,
            ease: 'none',
            overwrite: 'auto',
            scrollTrigger: {
                trigger: stage,
                start: () => `top top+=${stickyTop}`,
                end: () => `+=${distance}`,
                scrub: 0.9,
                invalidateOnRefresh: true,
                fastScrollEnd: true,
            },
        });

        const revealTween = gsap.fromTo(
            items,
            { autoAlpha: 0, y: 28, scale: 0.985 },
            {
                autoAlpha: 1,
                y: 0,
                scale: 1,
                duration: 0.75,
                stagger: 0.08,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: stage,
                    start: 'top 70%',
                    once: true,
                },
            },
        );

        ScrollTrigger.addEventListener('refreshInit', onRefreshInit);

        return () => {
            ScrollTrigger.removeEventListener('refreshInit', onRefreshInit);
            travelTween.scrollTrigger?.kill();
            travelTween.kill();
            revealTween.scrollTrigger?.kill();
            revealTween.kill();
            stage.style.removeProperty('min-height');
            stage.style.removeProperty('--horizontal-sticky-top');
            gsap.set(track, { clearProps: 'all' });
            gsap.set(items, { clearProps: 'all' });
        };
    });

    mm.add('(max-width: 1023px)', () => {
        stage.style.removeProperty('min-height');
        stage.style.removeProperty('--horizontal-sticky-top');
        gsap.set(track, { clearProps: 'all' });
        gsap.set(items, { clearProps: 'all' });
    });
};
