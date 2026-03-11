import { q, isDesktop } from './utils';

export const initMenuTransition = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const hero = q('[data-hero-section]');
    const verticalNav = q('[data-hero-vertical-nav]');
    const stickyHeader = q('[data-sticky-header]');

    if (!hero || !stickyHeader) return;

    const setHeaderVisibility = (isVisible) => {
        gsap.set(stickyHeader, { autoAlpha: isVisible ? 1 : 0, y: isVisible ? 0 : -18 });
        document.body.classList.toggle('hero-passed', isVisible);
    };

    setHeaderVisibility(false);

    if (reducedMotion) {
        ScrollTrigger.create({
            trigger: hero,
            start: 'bottom top',
            onEnter: () => setHeaderVisibility(true),
            onLeaveBack: () => setHeaderVisibility(false),
        });
        return;
    }

    const mm = gsap.matchMedia();

    mm.add('(min-width: 1024px)', () => {
        gsap.set(stickyHeader, { autoAlpha: 0, y: -18 });
        if (verticalNav) gsap.set(verticalNav, { autoAlpha: 1, y: 0, scale: 1, filter: 'blur(0px)' });

        const timeline = gsap.timeline({
            defaults: { ease: 'none' },
            scrollTrigger: {
                trigger: hero,
                start: 'top top',
                end: 'bottom top',
                scrub: 0.35,
                invalidateOnRefresh: true,
                onUpdate: (self) => {
                    document.body.classList.toggle('hero-passed', self.progress > 0.82);
                },
                onLeave: () => document.body.classList.add('hero-passed'),
                onLeaveBack: () => document.body.classList.remove('hero-passed'),
            },
        });

        if (verticalNav) {
            timeline.to(
                verticalNav,
                {
                    autoAlpha: 0,
                    y: -24,
                    scale: 0.985,
                    filter: 'blur(2px)',
                },
                0.08,
            );
        }

        timeline.to(stickyHeader, { autoAlpha: 1, y: 0 }, 0.58);

        return () => {
            timeline.kill();
            gsap.set(stickyHeader, { clearProps: 'all' });
            if (verticalNav) gsap.set(verticalNav, { clearProps: 'all' });
            document.body.classList.remove('hero-passed');
        };
    });

    if (!isDesktop()) {
        ScrollTrigger.create({
            trigger: hero,
            start: 'bottom top',
            onEnter: () => {
                document.body.classList.add('hero-passed');
                gsap.to(stickyHeader, { autoAlpha: 1, y: 0, duration: 0.35, ease: 'power2.out' });
            },
            onLeaveBack: () => {
                document.body.classList.remove('hero-passed');
                gsap.to(stickyHeader, { autoAlpha: 0, y: -18, duration: 0.25, ease: 'power2.out' });
            },
        });
    }
};
