import { qa } from './utils';

export const initServicesTabs = ({ gsap }) => {
    const tabTriggers = qa('[data-tab-trigger]');
    const tabPanels = qa('[data-tab-panel]');
    if (!tabTriggers.length || !tabPanels.length) return;

    const showPanel = (panel) => {
        panel.classList.remove('hidden');
        gsap.fromTo(
            panel,
            { autoAlpha: 0, y: 16 },
            { autoAlpha: 1, y: 0, duration: 0.45, ease: 'power2.out' },
        );
    };

    const activateTab = (tabName) => {
        tabTriggers.forEach((trigger) => {
            const isActive = trigger.dataset.tabTrigger === tabName;
            trigger.classList.toggle('is-active', isActive);
            trigger.setAttribute('aria-selected', String(isActive));
        });

        tabPanels.forEach((panel) => {
            const isCurrent = panel.dataset.tabPanel === tabName;
            if (isCurrent) {
                showPanel(panel);
            } else {
                panel.classList.add('hidden');
                gsap.set(panel, { clearProps: 'all' });
            }
        });
    };

    tabTriggers.forEach((trigger) => {
        trigger.addEventListener('click', () => activateTab(trigger.dataset.tabTrigger));
    });
};
