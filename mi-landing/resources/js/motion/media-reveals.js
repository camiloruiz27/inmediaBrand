import { qa } from './utils';

const mediaPreset = {
    hero: { duration: 1.2, y: 36, scale: 1.08, start: 'top 78%' },
    cinematic: { duration: 1.05, y: 32, scale: 1.06, start: 'top 82%' },
    portfolio: { duration: 0.9, y: 24, scale: 1.05, start: 'top 84%' },
    editorial: { duration: 0.85, y: 20, scale: 1.03, start: 'top 86%' },
    services: { duration: 0.8, y: 18, scale: 1.02, start: 'top 87%' },
    cta: { duration: 1.05, y: 30, scale: 1.04, start: 'top 84%' },
};

export const initMediaReveals = ({ gsap, ScrollTrigger, reducedMotion }) => {
    const mediaBlocks = qa('[data-media-reveal]');
    if (!mediaBlocks.length) return;

    mediaBlocks.forEach((block) => {
        const presetKey = block.dataset.mediaReveal || 'editorial';
        const preset = mediaPreset[presetKey] ?? mediaPreset.editorial;
        const overlay = block.querySelector('[data-media-overlay]');

        if (reducedMotion) {
            gsap.set(block, { autoAlpha: 1, y: 0, scale: 1 });
            if (overlay) gsap.set(overlay, { autoAlpha: 1 });
            return;
        }

        const timeline = gsap.timeline({
            scrollTrigger: {
                trigger: block,
                start: preset.start,
                once: true,
            },
            defaults: { ease: 'power3.out' },
        });

        timeline.fromTo(
            block,
            { autoAlpha: 0, y: preset.y, scale: preset.scale },
            { autoAlpha: 1, y: 0, scale: 1, duration: preset.duration },
        );

        if (overlay) {
            timeline.fromTo(
                overlay,
                { autoAlpha: 0.88 },
                { autoAlpha: 1, duration: Math.min(0.72, preset.duration * 0.7) },
                0.18,
            );
        }
    });
};
