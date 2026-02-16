(() => {
  const nav = document.querySelector('.main-navigation');
  const menuToggle = document.querySelector('.menu-toggle');
  const searchToggle = document.querySelector('.search-btn');
  const searchWrap = document.querySelector('.header-search');
  const topButton = document.querySelector('.back-to-top');

  if (menuToggle && nav) {
    menuToggle.addEventListener('click', () => {
      nav.classList.toggle('is-open');
      const expanded = nav.classList.contains('is-open');
      menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });
  }

  if (searchToggle && searchWrap) {
    searchToggle.addEventListener('click', () => {
      const isHidden = searchWrap.hasAttribute('hidden');
      if (isHidden) {
        searchWrap.removeAttribute('hidden');
      } else {
        searchWrap.setAttribute('hidden', 'hidden');
      }
      searchToggle.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
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

  const tocRoot = document.querySelector('#article-toc');
  const articleBody = document.querySelector('.article-body');
  if (tocRoot && articleBody) {
    const headings = articleBody.querySelectorAll('h2, h3');
    if (headings.length) {
      const list = document.createElement('div');
      headings.forEach((heading, index) => {
        if (!heading.id) {
          heading.id = `section-${index + 1}`;
        }

        const link = document.createElement('a');
        link.href = `#${heading.id}`;
        link.textContent = heading.textContent;
        if (heading.tagName.toLowerCase() === 'h3') {
          link.style.paddingLeft = '10px';
          link.style.fontSize = '0.86rem';
        }

        list.appendChild(link);
      });

      tocRoot.appendChild(list);
    } else {
      tocRoot.closest('.rail-card')?.setAttribute('hidden', 'hidden');
    }
  }

  const heroSlider = document.querySelector('.hero-slider');
  if (heroSlider) {
    const slides = Array.from(heroSlider.querySelectorAll('.hero-slide'));
    const dots = Array.from(heroSlider.querySelectorAll('[data-slide-dot]'));
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let current = 0;
    let intervalId;

    const setActive = (index) => {
      slides.forEach((slide, i) => {
        const isActive = i === index;
        slide.classList.toggle('is-active', isActive);
        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
      });
      dots.forEach((dot, i) => {
        const isActive = i === index;
        dot.classList.toggle('is-active', isActive);
        dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });
      current = index;
    };

    const goToNext = () => {
      const next = (current + 1) % slides.length;
      setActive(next);
    };

    const stopAutoplay = () => {
      if (intervalId) {
        window.clearInterval(intervalId);
        intervalId = undefined;
      }
    };

    const startAutoplay = () => {
      if (intervalId || slides.length < 2 || prefersReducedMotion) {
        return;
      }
      const delay = Number(heroSlider.dataset.autoplay || 5000);
      intervalId = window.setInterval(goToNext, delay);
    };

    dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        setActive(Number(dot.dataset.slideDot || 0));
      });
    });

    startAutoplay();

    heroSlider.addEventListener('mouseenter', stopAutoplay);
    heroSlider.addEventListener('mouseleave', startAutoplay);
  }
})();
