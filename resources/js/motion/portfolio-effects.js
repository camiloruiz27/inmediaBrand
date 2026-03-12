import { q, qa } from './utils';

export const initPortfolioEffects = ({ reducedMotion }) => {
    const track = q('[data-portfolio-track]');
    const prevButton = q('[data-portfolio-prev]');
    const nextButton = q('[data-portfolio-next]');

    if (!track || !prevButton || !nextButton) return;

    const step = () => Math.max(track.clientWidth * 0.75, 280);
    const doScroll = (distance) => {
        track.scrollBy({ left: distance, behavior: 'smooth' });
    };

    prevButton.addEventListener('click', () => doScroll(-step()));
    nextButton.addEventListener('click', () => doScroll(step()));

    if (reducedMotion) return;

    const items = qa('[data-portfolio-item]');
    track.addEventListener('keydown', (event) => {
        if (!items.length) return;
        if (event.key === 'ArrowRight') doScroll(step() * 0.7);
        if (event.key === 'ArrowLeft') doScroll(step() * -0.7);
    });
};
