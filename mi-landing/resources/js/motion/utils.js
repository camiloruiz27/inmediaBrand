export const q = (selector, scope = document) => scope.querySelector(selector);
export const qa = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));

export const isTouchDevice = () =>
    window.matchMedia('(hover: none), (pointer: coarse)').matches;

export const isDesktop = () => window.matchMedia('(min-width: 1024px)').matches;

export const rafThrottle = (callback) => {
    let frameId = null;

    return (...args) => {
        if (frameId) return;
        frameId = window.requestAnimationFrame(() => {
            frameId = null;
            callback(...args);
        });
    };
};
