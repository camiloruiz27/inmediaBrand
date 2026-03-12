import { qa } from './utils';

export const initMediaFirstSections = ({ reducedMotion }) => {
    const videos = qa('[data-loop-video]');
    if (!videos.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                const video = entry.target;
                if (!(video instanceof HTMLVideoElement)) return;

                if (entry.isIntersecting && !reducedMotion) {
                    video.play().catch(() => null);
                } else {
                    video.pause();
                }
            });
        },
        { threshold: 0.35 },
    );

    videos.forEach((video) => {
        video.muted = true;
        video.playsInline = true;
        if (reducedMotion) {
            video.pause();
            return;
        }
        observer.observe(video);
    });
};
