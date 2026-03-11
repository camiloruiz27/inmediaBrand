import { q } from './utils';

export const initPageLoader = ({ reducedMotion }) => {
    const loader = q('#page-loader');
    if (!loader) return;

    const body = document.body;
    let completed = false;
    const minVisibleMs = 700;
    const startedAt = performance.now();

    const complete = () => {
        if (completed) return;
        completed = true;

        const elapsed = performance.now() - startedAt;
        const delay = Math.max(0, minVisibleMs - elapsed);

        window.setTimeout(() => {
            if (reducedMotion) {
                loader.remove();
                body.classList.remove('page-loading');
                return;
            }

            loader.classList.add('is-leaving');
            body.classList.remove('page-loading');
            window.setTimeout(() => loader.remove(), 650);
        }, delay);
    };

    const fallback = window.setTimeout(complete, 6500);

    window.addEventListener(
        'load',
        () => {
            window.clearTimeout(fallback);
            complete();
        },
        { once: true },
    );
};
