(function ($, Drupal, once) {
  function initBootstrapLikePartnerCarousel(carouselEl) {
    if (!carouselEl || carouselEl.dataset.partnerInitialized === '1') {
      return;
    }

    var slides = Array.prototype.slice.call(
      carouselEl.querySelectorAll('.carousel-inner > .item')
    );
    var indicators = Array.prototype.slice.call(
      carouselEl.querySelectorAll('.carousel-indicators > li')
    );

    if (!slides.length) {
      return;
    }

    var currentIndex = slides.findIndex(function (slide) {
      return slide.classList.contains('active');
    });
    if (currentIndex < 0) {
      currentIndex = 0;
    }

    var timerId = null;
    var intervalMs = parseInt(carouselEl.getAttribute('data-interval') || '4500', 10);
    var transitionMs = 420;
    var isAnimating = false;

    if (!Number.isFinite(intervalMs) || intervalMs < 1000) {
      intervalMs = 4500;
    }

    function normalizeIndex(index) {
      if (!slides.length) {
        return 0;
      }
      var normalized = index % slides.length;
      return normalized < 0 ? normalized + slides.length : normalized;
    }

    function setIndicators(index) {
      indicators.forEach(function (dot, i) {
        dot.classList.toggle('active', i === index);
      });
    }

    function resetSlideClasses() {
      slides.forEach(function (slide) {
        slide.classList.remove(
          'is-transitioning',
          'slide-from-next',
          'slide-from-prev',
          'slide-to-next',
          'slide-to-prev'
        );
      });
    }

    function getDirection(fromIndex, toIndex) {
      if (toIndex === fromIndex || slides.length <= 1) {
        return 0;
      }
      var nextDistance = (toIndex - fromIndex + slides.length) % slides.length;
      var prevDistance = (fromIndex - toIndex + slides.length) % slides.length;
      return nextDistance <= prevDistance ? 1 : -1;
    }

    function showSlide(index, animate) {
      var targetIndex = normalizeIndex(index);
      var shouldAnimate = animate !== false;

      if (targetIndex === currentIndex) {
        if (!shouldAnimate) {
          resetSlideClasses();
          slides.forEach(function (slide, i) {
            slide.classList.toggle('active', i === targetIndex);
          });
        }
        setIndicators(targetIndex);
        return;
      }

      if (isAnimating && shouldAnimate) {
        return;
      }

      var currentSlide = slides[currentIndex];
      var nextSlideEl = slides[targetIndex];

      if (!currentSlide || !nextSlideEl) {
        return;
      }

      if (!shouldAnimate) {
        resetSlideClasses();
        slides.forEach(function (slide, i) {
          slide.classList.toggle('active', i === targetIndex);
        });
        setIndicators(targetIndex);
        currentIndex = targetIndex;
        return;
      }

      var direction = getDirection(currentIndex, targetIndex);
      var incomingClass = direction >= 0 ? 'slide-from-next' : 'slide-from-prev';
      var outgoingClass = direction >= 0 ? 'slide-to-next' : 'slide-to-prev';
      var cleanupDone = false;
      var cleanupTimeout = null;

      resetSlideClasses();
      currentSlide.classList.add('active', 'is-transitioning');
      nextSlideEl.classList.add('active', 'is-transitioning', incomingClass);

      // Force a reflow so the browser picks up the starting transform.
      void nextSlideEl.offsetWidth;

      currentSlide.classList.add(outgoingClass);
      nextSlideEl.classList.remove(incomingClass);
      setIndicators(targetIndex);
      isAnimating = true;

      function finishTransition() {
        if (cleanupDone) {
          return;
        }
        cleanupDone = true;
        isAnimating = false;
        nextSlideEl.removeEventListener('transitionend', onTransitionEnd);
        if (cleanupTimeout) {
          window.clearTimeout(cleanupTimeout);
        }
        resetSlideClasses();
        slides.forEach(function (slide, i) {
          slide.classList.toggle('active', i === targetIndex);
        });
        currentIndex = targetIndex;
      }

      function onTransitionEnd(event) {
        if (event.target === nextSlideEl) {
          finishTransition();
        }
      }

      nextSlideEl.addEventListener('transitionend', onTransitionEnd);
      cleanupTimeout = window.setTimeout(finishTransition, transitionMs + 150);
    }

    function nextSlide() {
      var next = (currentIndex + 1) % slides.length;
      showSlide(next, true);
    }

    function startTimer() {
      stopTimer();
      timerId = window.setInterval(nextSlide, intervalMs);
    }

    function stopTimer() {
      if (timerId) {
        window.clearInterval(timerId);
        timerId = null;
      }
    }

    indicators.forEach(function (dot, idx) {
      dot.addEventListener('click', function (event) {
        event.preventDefault();
        showSlide(idx, true);
        startTimer();
      });
    });

    carouselEl.addEventListener('mouseenter', stopTimer);
    carouselEl.addEventListener('mouseleave', startTimer);

    showSlide(currentIndex, false);
    startTimer();
    carouselEl.dataset.partnerInitialized = '1';
  }

  function initLegacyPartnerPager(carouselEl) {
    if (!carouselEl || carouselEl.dataset.partnerInitialized === '1' || carouselEl.classList.contains('owl-loaded')) {
      return;
    }

    var items = Array.prototype.slice.call(carouselEl.querySelectorAll('.slide-item'));
    if (!items.length) {
      return;
    }

    var perPage = 4;
    var pages = Math.max(1, Math.ceil(items.length / perPage));
    var currentPage = 0;
    var timerId = null;
    var intervalMs = 4500;

    var indicators = document.createElement('ol');
    indicators.className = 'carousel-indicators partner-generated-indicators';

    for (var i = 0; i < pages; i++) {
      var li = document.createElement('li');
      if (i === 0) {
        li.className = 'active';
      }
      li.setAttribute('data-slide-to', i);
      indicators.appendChild(li);
    }

    carouselEl.parentNode.appendChild(indicators);

    function showPage(index) {
      items.forEach(function (item, itemIndex) {
        var inPage = itemIndex >= index * perPage && itemIndex < (index + 1) * perPage;
        item.style.display = inPage ? 'inline-block' : 'none';
        item.style.width = '24%';
        item.style.verticalAlign = 'middle';
        item.style.textAlign = 'center';
      });
      Array.prototype.slice.call(indicators.querySelectorAll('li')).forEach(function (dot, dotIndex) {
        dot.classList.toggle('active', dotIndex === index);
      });
      currentPage = index;
    }

    function nextPage() {
      showPage((currentPage + 1) % pages);
    }

    function startTimer() {
      stopTimer();
      timerId = window.setInterval(nextPage, intervalMs);
    }

    function stopTimer() {
      if (timerId) {
        window.clearInterval(timerId);
        timerId = null;
      }
    }

    Array.prototype.slice.call(indicators.querySelectorAll('li')).forEach(function (dot) {
      dot.addEventListener('click', function (event) {
        event.preventDefault();
        var idx = parseInt(dot.getAttribute('data-slide-to') || '0', 10);
        showPage(idx);
        startTimer();
      });
    });

    carouselEl.addEventListener('mouseenter', stopTimer);
    carouselEl.addEventListener('mouseleave', startTimer);

    showPage(0);
    startTimer();
    carouselEl.dataset.partnerInitialized = '1';
  }

  function initTrainingBoxScrollScale(boxEl) {
    if (!boxEl || boxEl.dataset.trainingScaleInitialized === '1') {
      return;
    }

    var maxScale = 1;
    var ticking = false;

    function getMaxScale() {
      var baseWidth = boxEl.offsetWidth || boxEl.getBoundingClientRect().width;
      if (!baseWidth || window.innerWidth <= 991) {
        return 1;
      }

      var targetWidth = Math.max(baseWidth, window.innerWidth - 40);
      var scale = targetWidth / baseWidth;
      return Math.max(1, Math.min(scale, 1.38));
    }

    function applyScale() {
      ticking = false;

      if (window.innerWidth <= 991) {
        boxEl.style.transform = '';
        return;
      }

      var rect = boxEl.getBoundingClientRect();
      var viewportHeight = window.innerHeight || document.documentElement.clientHeight || 1;
      var start = viewportHeight * 0.92;
      var end = viewportHeight * 0.2;
      var progress = (start - rect.top) / Math.max(1, start - end);

      if (progress < 0) {
        progress = 0;
      } else if (progress > 1) {
        progress = 1;
      }

      var scale = maxScale - ((maxScale - 1) * progress);
      boxEl.style.transform = 'scale(' + scale.toFixed(4) + ')';
    }

    function requestApplyScale() {
      if (ticking) {
        return;
      }
      ticking = true;
      window.requestAnimationFrame(applyScale);
    }

    function onResize() {
      maxScale = getMaxScale();
      requestApplyScale();
    }

    maxScale = getMaxScale();
    requestApplyScale();
    window.addEventListener('scroll', requestApplyScale, { passive: true });
    window.addEventListener('resize', onResize);
    boxEl.dataset.trainingScaleInitialized = '1';
  }

  function initPanelGroupAccordion(accordionEl) {
    if (!accordionEl || accordionEl.dataset.accordionInitialized === '1') {
      return;
    }

    var triggers = Array.prototype.slice.call(
      accordionEl.querySelectorAll('.panel-title a[data-toggle="collapse"]')
    );
    if (!triggers.length) {
      return;
    }

    syncAccordionPanelsDisplay(accordionEl);
    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        toggleAccordionTrigger(trigger, accordionEl);
      });
    });

    accordionEl.dataset.accordionInitialized = '1';
  }

  function toggleAccordionTrigger(trigger, fallbackRoot) {
    var targetSelector = trigger.getAttribute('href');
    if (!targetSelector || targetSelector.charAt(0) !== '#') {
      return;
    }

    var root = fallbackRoot || document;
    var target = root.querySelector(targetSelector) || document.querySelector(targetSelector);
    if (!target) {
      return;
    }

    var parentSelector = trigger.getAttribute('data-parent');
    var scope = parentSelector ? document.querySelector(parentSelector) : null;
    if (!scope) {
      scope = target.closest('.panel-group') || root;
    }

    Array.prototype.slice.call(scope.querySelectorAll('.panel-collapse.in')).forEach(function (openPanel) {
      if (openPanel !== target) {
        openPanel.classList.remove('in');
      }
    });
    Array.prototype.slice.call(scope.querySelectorAll('.panel-title a[data-toggle="collapse"]')).forEach(function (otherTrigger) {
      if (otherTrigger !== trigger) {
        otherTrigger.classList.add('collapsed');
        otherTrigger.setAttribute('aria-expanded', 'false');
      }
    });

    var willOpen = !target.classList.contains('in');
    target.classList.toggle('in', willOpen);
    trigger.classList.toggle('collapsed', !willOpen);
    trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    syncAccordionPanelsDisplay(scope);
  }

  function syncAccordionPanelsDisplay(scope) {
    if (!scope) {
      return;
    }
    Array.prototype.slice.call(scope.querySelectorAll('.panel-collapse')).forEach(function (panel) {
      panel.style.display = panel.classList.contains('in') ? 'block' : 'none';
    });
  }

  Drupal.behaviors.arcadia11Menu = {
    attach: function attach(context) {
      once('arcadia11-menu', '#menumibile', context).forEach(function (toggleButton) {
        var panel = context.querySelector('.main-menu .navbar-collapse');
        if (!panel) {
          return;
        }

        toggleButton.addEventListener('click', function () {
          panel.classList.toggle('show');
        });
      });

      once('arcadia11-scroll', '.scroll-to-top', context).forEach(function (button) {
        button.addEventListener('click', function () {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      });

      once('arcadia11-header-logo-class', '#block-arcadia11-branding img, .main-header .logo img', context).forEach(function (logoImg) {
        logoImg.classList.add('arcadia-header-logo');
      });

      if (typeof $.fn.owlCarousel === 'function') {
        once('arcadia11-partner-carousel', '.partner-carousel-v2', context).forEach(function (carousel) {
          var $carousel = $(carousel);
          if ($carousel.hasClass('owl-loaded')) {
            return;
          }
          $carousel.owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            smartSpeed: 500,
            autoplay: 4000,
            responsive: {
              0: { items: 1 },
              480: { items: 2 },
              600: { items: 3 },
              800: { items: 4 },
              1024: { items: 4 }
            }
          });
        });
      }

      once('arcadia11-partner-bootstrap', '#partner-carousel-bootstrap', context).forEach(function (carouselEl) {
        initBootstrapLikePartnerCarousel(carouselEl);
      });

      once('arcadia11-partner-legacy-fallback', '.partner-carousel-v2', context).forEach(function (carouselEl) {
        window.setTimeout(function () {
          initLegacyPartnerPager(carouselEl);
        }, 250);
      });

      once('arcadia11-training-scale', '.secondbackgroundImage .training-box', context).forEach(function (trainingBox) {
        initTrainingBoxScrollScale(trainingBox);
      });

      once('arcadia11-accordion-init', '.panel-group', context).forEach(function (accordionEl) {
        initPanelGroupAccordion(accordionEl);
      });
    }
  };

  // Fallback for cases where Drupal behaviors do not attach as expected.
  document.addEventListener('DOMContentLoaded', function () {
    initBootstrapLikePartnerCarousel(document.querySelector('#partner-carousel-bootstrap'));
    Array.prototype.slice.call(document.querySelectorAll('.partner-carousel-v2')).forEach(function (el) {
      initLegacyPartnerPager(el);
    });
    Array.prototype.slice.call(document.querySelectorAll('.secondbackgroundImage .training-box')).forEach(function (el) {
      initTrainingBoxScrollScale(el);
    });
    Array.prototype.slice.call(document.querySelectorAll('.panel-group')).forEach(function (el) {
      initPanelGroupAccordion(el);
    });

    document.addEventListener('click', function (event) {
      var trigger = event.target.closest('.panel-title a[data-toggle="collapse"]');
      if (!trigger) {
        return;
      }
      var group = trigger.closest('.panel-group');
      // Already initialized groups have dedicated listeners; avoid double-toggle.
      if (group && group.dataset.accordionInitialized === '1') {
        return;
      }
      event.preventDefault();
      toggleAccordionTrigger(trigger, document);
    });
  });
})(jQuery, Drupal, once);
