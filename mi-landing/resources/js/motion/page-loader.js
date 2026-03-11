import { q } from './utils';

export const initPageLoader = ({ reducedMotion }) => {
    const loader = q('#page-loader');
    if (!loader) return;

    const body = document.body;
    const isDataSaver = navigator.connection?.saveData === true;
    const lowPowerCpu = typeof navigator.hardwareConcurrency === 'number' && navigator.hardwareConcurrency <= 4;

    if (reducedMotion || isDataSaver || lowPowerCpu) {
        loader.remove();
        body.classList.remove('page-loading');
        return;
    }

    let completed = false;
    const minVisibleMs = 180;
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

    const fallback = window.setTimeout(complete, 2200);

    window.addEventListener(
        'load',
        () => {
            window.clearTimeout(fallback);
            complete();
        },
        { once: true },
    );
};
