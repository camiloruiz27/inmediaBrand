import SplitType from 'split-type';
import { qa } from './utils';

export const initTextAnimations = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const splitTargets = qa('[data-split="lines"]');
    if (!splitTargets.length) return;

    if (reducedMotion || window.innerWidth < 768) {
        splitTargets.forEach((target) => gsap.set(target, { clearProps: 'all' }));
        return;
    }

    const animateTarget = (target) => {
        if (target.dataset.splitReady === '1') return;
        target.dataset.splitReady = '1';

        window.requestAnimationFrame(() => {
            const split = new SplitType(target, { types: 'lines' });
            const lines = split.lines ?? [];
            if (!lines.length) return;

            gsap.set(lines, { overflow: 'hidden' });

            gsap.fromTo(
                lines,
                { yPercent: 110, autoAlpha: 0 },
                {
                    yPercent: 0,
                    autoAlpha: 1,
                    duration: 0.9,
                    stagger: 0.08,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: target,
                        start: target.hasAttribute('data-hero-title') ? 'top 75%' : 'top 86%',
                        once: true,
                    },
                },
            );
        });
    };

    const setup = () => {
        if (!('IntersectionObserver' in window)) {
            splitTargets.forEach(animateTarget);
            return;
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    observer.unobserve(entry.target);
                    animateTarget(entry.target);
                });
            },
            { rootMargin: '0px 0px -10% 0px', threshold: 0.05 },
        );

        splitTargets.forEach((target) => observer.observe(target));
    };

    if (document.fonts?.ready) {
        document.fonts.ready.then(setup);
        return;
    }

    setup();
};
