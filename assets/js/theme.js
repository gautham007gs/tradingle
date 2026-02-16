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
})();
