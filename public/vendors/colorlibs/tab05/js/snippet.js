/*!
 * tabs-05 - Colorlib. No jQuery, no framework.
 * Behaviours: own-script
 */
/* The page's own script, unchanged: it never needed jQuery. */
(() => {
  'use strict';

  
  const initTabs = (root, opts = {}) => {
    const list = root.querySelector('[role="tablist"]');
    if (!list) return null;
    const tabs = Array.from(list.querySelectorAll('[role="tab"]'));
    if (!tabs.length) return null;
    const panelOf = (tab) => document.getElementById(tab.getAttribute('aria-controls'));

    const select = (tab, focus) => {
      const target = panelOf(tab);
      tabs.forEach((t) => {
        const on = t === tab;
        t.setAttribute('aria-selected', on ? 'true' : 'false');
        t.tabIndex = on ? 0 : -1;
        const panel = panelOf(t);
        if (panel && panel !== target) panel.hidden = true;
      });
      if (target) {
        target.hidden = false;
        target.setAttribute('aria-labelledby', tab.id);
      }
      if (focus) tab.focus({ preventScroll: !!opts.preventScroll });
      if (opts.onChange) opts.onChange(tab, tabs.indexOf(tab));
    };

    tabs.forEach((tab) => tab.addEventListener('click', () => select(tab, false)));

    list.addEventListener('keydown', (e) => {
      const i = tabs.indexOf(e.target);
      if (i < 0) return;
      const vertical = list.getAttribute('aria-orientation') === 'vertical';
      const next = vertical ? ['ArrowDown', 'ArrowRight'] : ['ArrowRight'];
      const prev = vertical ? ['ArrowUp', 'ArrowLeft'] : ['ArrowLeft'];
      let n = -1;
      if (next.includes(e.key)) n = (i + 1) % tabs.length;
      else if (prev.includes(e.key)) n = (i - 1 + tabs.length) % tabs.length;
      else if (e.key === 'Home') n = 0;
      else if (e.key === 'End') n = tabs.length - 1;
      if (n < 0) return;
      e.preventDefault();
      select(tabs[n], true);
    });

    const first = tabs.find((t) => t.getAttribute('aria-selected') === 'true') || tabs[0];
    select(first, false);
    return { list, tabs, select };
  };

  
  const initFolderTabs = () => {
    const root = document.querySelector('.cl-tabs05');
    if (!root) return;
    const folder = root.querySelector('.cl-tabs05__folder');
    initTabs(root, {
      onChange: (tab) => {
        const color = tab.style.getPropertyValue('--cl-tabs05-color');
        if (folder && color) folder.style.setProperty('--cl-tabs05-folder', color.trim());
      },
    });
  };

  initFolderTabs();
})();
