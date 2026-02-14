(() => {
  const nav = document.querySelector('.main-navigation');
  const menuToggle = document.querySelector('.menu-toggle');
  const darkToggle = document.querySelector('[data-dark-toggle]');
  const topButton = document.querySelector('.back-to-top');

  if (menuToggle && nav) {
    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('open');
      const expanded = nav.classList.contains('open');
      menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });
  }

  if (darkToggle) {
    const root = document.documentElement;
    const stored = localStorage.getItem('tradingle-dark-mode');
    if (stored === '1') {
      root.setAttribute('data-theme', 'dark');
    }
    if (stored === '0') {
      root.setAttribute('data-theme', 'light');
    }

    darkToggle.addEventListener('click', () => {
      const nextTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-theme', nextTheme);
      localStorage.setItem('tradingle-dark-mode', nextTheme === 'dark' ? '1' : '0');
    });
  }

  if (topButton) {
    const onScroll = () => {
      topButton.classList.toggle('show', window.scrollY > 300);
    };

    window.addEventListener('scroll', onScroll, { passive: true });

    topButton.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
})();
