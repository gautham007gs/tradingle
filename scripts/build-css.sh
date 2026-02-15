#!/usr/bin/env bash
set -euo pipefail

# Fallback builder for environments without Sass compiler.
# Preferred: sass assets/scss/main.scss assets/css/production.css --style=compressed
if command -v sass >/dev/null 2>&1; then
  sass assets/scss/main.scss assets/css/production.css --style=compressed
  cp assets/css/production.css assets/css/main.css
  echo "Built CSS with sass compiler"
else
  cat assets/css/base/_variables.css \
      assets/css/base/_reset.css \
      assets/css/base/_typography.css \
      assets/css/base/_global.css \
      assets/css/layout/_container.css \
      assets/css/layout/_grid.css \
      assets/css/layout/_header.css \
      assets/css/layout/_footer.css \
      assets/css/layout/_sidebar.css \
      assets/css/components/_buttons.css \
      assets/css/components/_cards.css \
      assets/css/components/_badges.css \
      assets/css/components/_forms.css \
      assets/css/components/_ticker.css \
      assets/css/components/_carousel.css \
      assets/css/components/_author.css \
      assets/css/components/_newsletter.css \
      assets/css/pages/_home.css \
      assets/css/pages/_single.css \
      assets/css/pages/_archive.css \
      assets/css/pages/_search.css \
      assets/css/pages/_author-page.css \
      assets/css/utilities/_spacing.css \
      assets/css/utilities/_display.css \
      assets/css/utilities/_helpers.css > assets/css/main.css
  cp assets/css/main.css assets/css/production.css
  echo "Built CSS by concatenating existing css layer files (sass unavailable)"
fi
