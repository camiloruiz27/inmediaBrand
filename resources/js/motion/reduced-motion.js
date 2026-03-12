const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

export const isReducedMotionPreferred = () => mediaQuery.matches;

export const setReducedMotionClass = () => {
    document.body.classList.toggle('reduced-motion', mediaQuery.matches);
};
