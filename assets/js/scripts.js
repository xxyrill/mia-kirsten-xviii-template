// COUNTDOWN SECTION
function initCountdown(){
    var $cd = jQuery('.countdown');
    if(!$cd.length) return;

    var targetStr = $cd.data('target');
    if(!targetStr) return;

    var target = new Date(targetStr);

    function update(){
        var now = new Date();
        var diff = target - now;
        if (diff < 0) diff = 0;

        var seconds = Math.floor(diff / 1000);
        var days = Math.floor(seconds / (3600 * 24));
        seconds -= days * 3600 * 24;
        var hours = Math.floor(seconds / 3600);
        seconds -= hours * 3600;
        var minutes = Math.floor(seconds / 60);
        seconds -= minutes * 60;

        $cd.find('.js-countdown-days').text(days);
        $cd.find('.js-countdown-hours').text(hours);
        $cd.find('.js-countdown-minutes').text(minutes);
        $cd.find('.js-countdown-seconds').text(seconds);
    }

    update();
    setInterval(update, 1000);
}

// GALLERY SECTION (Flipbook + Lightbox)
function initFlipbooksAndUnifiedLightbox() {
  // prevent double init
  if (window.__editorialFlipbooksInit) return;
  window.__editorialFlipbooksInit = true;

  // Remove duplicate lightbox overlays safely
  jQuery(".lightbox-overlay").not(":first").remove();

  // ---------------------------
  // 1) Build ONE global list for lightbox (Gallery + Entourage)
  // ---------------------------
  const lightboxSources = Array.from(
    document.querySelectorAll(".flipbook-source .gallery-item, .entourage-source .gallery-item")
  );

  // assign a global index so clones can open the right image
  lightboxSources.forEach((el, i) => {
    el.dataset.lbIndex = String(i);
  });

  // ---------------------------
  // 2) Unified Lightbox
  // ---------------------------
  const $overlay = jQuery(".lightbox-overlay");
  const $image = $overlay.find(".lightbox-image");

  if (!$overlay.length || !$image.length) {
    console.warn("Lightbox missing: .lightbox-overlay or .lightbox-image not found.");
    return;
  }

  let currentLbIndex = 0;

 function openByLbIndex(idx) {
  const total = lightboxSources.length;
  if (!total) return;

  currentLbIndex = (idx + total) % total;

  const src = jQuery(lightboxSources[currentLbIndex]).data("full-image");
  if (!src) return;

  $image.removeClass("fade-in");

  setTimeout(() => {
    $image.attr("src", src);

    setTimeout(() => {
      $image.addClass("fade-in");
    }, 30);
  }, 140);

  $overlay.addClass("active");
  $overlay.removeClass("show-arrows");
}

  // delegated click for ANY flipbook image clone
  jQuery(document)
    .off("click.unifiedLightbox")
    .on("click.unifiedLightbox", ".flipbook-spread .gallery-item", function (e) {
      e.preventDefault();

      const idx = parseInt(this.dataset.lbIndex || "0", 10);
      openByLbIndex(idx);
    });

	// close when tapping the dark overlay
	$overlay.off("click.unifiedClose").on("click.unifiedClose", function (e) {
	  if (e.target === this) {
		$overlay.removeClass("active show-arrows");
	  }
	});

	// close button
	$overlay.find(".lightbox-close").off("click").on("click", function (e) {
	  e.stopPropagation();
	  $overlay.removeClass("active show-arrows");
	});
	
	jQuery(document).off("keydown.unifiedLightbox").on("keydown.unifiedLightbox", function (e) {
	  if (e.key === "Escape") {
		$overlay.removeClass("active show-arrows");
	  }
	});
	
	// optional: show arrows when tapping the image area instead of the dark backdrop
	$image.off("click.showArrows").on("click.showArrows", function (e) {
	  e.stopPropagation();
	  $overlay.toggleClass("show-arrows");
	});

  // arrows
  $overlay.find(".lightbox-arrow.right").off("click").on("click", function (e) {
    e.stopPropagation();
    openByLbIndex(currentLbIndex + 1);
  });

  $overlay.find(".lightbox-arrow.left").off("click").on("click", function (e) {
    e.stopPropagation();
    openByLbIndex(currentLbIndex - 1);
  });

  // ---------------------------
  // 3) Flipbook initializer (reusable)
  // ---------------------------
  function initOneFlipbook(rootSelector, sourceSelector) {
    const root = document.querySelector(rootSelector);
    if (!root) return;

    const spread = root.querySelector("[data-spread]");
    const source = document.querySelector(sourceSelector);
    if (!spread || !source) return;

    const sourceItems = Array.from(source.querySelectorAll(".gallery-item"));
    if (!sourceItems.length) return;

    const outsidePrev = root.querySelector(":scope > .flip-prev");
    const outsideNext = root.querySelector(":scope > .flip-next");
    const overlayPrev = root.querySelector(".flipbook-shell .flip-prev.flip-nav--overlay");
    const overlayNext = root.querySelector(".flipbook-shell .flip-next.flip-nav--overlay");
    const dotsWrap = root.querySelector(".flipbook-dots");
    const counterEl = root.querySelector(".flipbook-counter");

    let pageIndex = 0;
    const isMobile = () => window.matchMedia("(max-width: 820px)").matches;

    function buildPage(item, side) {
      const page = document.createElement("div");
      page.className = `flip-page ${side}`;

      const clone = item.cloneNode(true);

      const bg = clone.getAttribute("data-thumb") || clone.getAttribute("data-full-image");
      if (bg) clone.style.setProperty("--page-bg", `url("${bg}")`);

      // copy the global lightbox index to the clone
      clone.dataset.lbIndex = item.dataset.lbIndex || "0";

      page.appendChild(clone);
      return page;
    }

    function buildDots() {
      if (!dotsWrap) return;

      dotsWrap.innerHTML = "";

      const totalDots = isMobile()
        ? sourceItems.length
        : Math.ceil(sourceItems.length / 2);

      for (let i = 0; i < totalDots; i++) {
        const dot = document.createElement("span");
        dot.className = "flipbook-dot" + (i === 0 ? " is-active" : "");
        dot.addEventListener("click", () => {
          pageIndex = isMobile() ? i : i * 2;

          if (!isMobile() && pageIndex >= sourceItems.length) {
            pageIndex = Math.max(0, sourceItems.length - 2);
          }

          render();
        });
        dotsWrap.appendChild(dot);
      }
    }

    function updateDots() {
      if (!dotsWrap) return;

      const dots = dotsWrap.querySelectorAll(".flipbook-dot");
      const activeDotIndex = isMobile()
        ? pageIndex
        : Math.floor(pageIndex / 2);

      dots.forEach((dot, i) => {
        dot.classList.toggle("is-active", i === activeDotIndex);
      });
    }

    function updateCounter() {
      if (!counterEl) return;

      const current = isMobile()
        ? pageIndex + 1
        : Math.floor(pageIndex / 2) + 1;

      const total = isMobile()
        ? sourceItems.length
        : Math.ceil(sourceItems.length / 2);

      counterEl.textContent = `${current} / ${total}`;
    }

    function render() {
      spread.innerHTML = "";

      const leftItem = sourceItems[pageIndex];
      if (leftItem) spread.appendChild(buildPage(leftItem, "left"));

      if (!isMobile()) {
        const rightItem = sourceItems[pageIndex + 1];
        if (rightItem) spread.appendChild(buildPage(rightItem, "right"));
      }

      updateDots();
      updateCounter();
    }

function flip(dir) {
  spread.classList.add("is-transitioning");

  setTimeout(() => {
    const step = isMobile() ? 1 : 2;

    pageIndex = (dir === "next")
      ? (pageIndex + step) % sourceItems.length
      : (pageIndex - step + sourceItems.length) % sourceItems.length;

    // keep pairing aligned on desktop
    if (!isMobile() && pageIndex % 2 !== 0) {
      pageIndex = (dir === "next") ? pageIndex - 1 : pageIndex + 1;
      pageIndex = (pageIndex + sourceItems.length) % sourceItems.length;
    }

    render();

    setTimeout(() => {
      spread.classList.remove("is-transitioning");
    }, 40);
  }, 180);
}

    function bind(btn, dir) {
      if (!btn) return;
      btn.addEventListener("click", () => flip(dir));
    }

    bind(outsidePrev, "prev");
    bind(outsideNext, "next");
    bind(overlayPrev, "prev");
    bind(overlayNext, "next");

    // swipe (mobile)
    let startX = 0;
    spread.addEventListener("touchstart", (e) => {
      startX = e.touches[0].clientX;
    }, { passive: true });

    spread.addEventListener("touchend", (e) => {
      const endX = e.changedTouches[0].clientX;
      const dx = endX - startX;
      if (Math.abs(dx) < 40) return;
      if (dx < 0) flip("next");
      else flip("prev");
    }, { passive: true });

    buildDots();
    render();

    window.addEventListener("resize", () => {
      buildDots();
      render();
    });
  }

  // init BOTH flipbooks
  initOneFlipbook("[data-flipbook]", ".flipbook-source");            // Gallery
  initOneFlipbook("[data-flipbook-entourage]", ".entourage-source"); // Entourage
}

// EVENT INFORMATION SECTION (Accordion)
function initAccordion(){
    jQuery('.event-accordion-header').on('click', function(){
        var targetId = jQuery(this).data('target');
        jQuery('.event-accordion-header').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.event-panel').removeClass('active');
        jQuery('#' + targetId).addClass('active');
    });
}

// PREVENT SCROLL TRAP ON MOBILE INSIDE DRESS CODE PANEL (PART OF "EVENT INFORMATION SECTION")
function fixDresscodeScrollTrap() {
    const panel = document.querySelector("#panel-dresscode");
    if (!panel) return;

    panel.addEventListener("touchmove", function (e) {
        const atTop = panel.scrollTop === 0;
        const atBottom = panel.scrollHeight - panel.scrollTop === panel.clientHeight;

        if (atTop && e.touches[0].clientY > this.lastY) {
            // Trying to scroll UP past the top → allow page scroll
            e.preventDefault();
            window.scrollBy(0, -10);
        }

        if (atBottom && e.touches[0].clientY < this.lastY) {
            // Trying to scroll DOWN past bottom → allow page scroll
            e.preventDefault();
            window.scrollBy(0, 10);
        }

        this.lastY = e.touches[0].clientY;
    }, { passive: false });
}

fixDresscodeScrollTrap();

// SCROLL ANIMATIONS SECTION
function initScrollAnimations(){
    var $elements = jQuery('.js-animate');
    if(!$elements.length) return;

    if('IntersectionObserver' in window){
        var observer = new IntersectionObserver(function(entries){
            entries.forEach(function(entry){
                if(entry.isIntersecting){
                    jQuery(entry.target).addClass('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, {threshold: 0.2});

        $elements.each(function(){
            observer.observe(this);
        });
    } else {
        function onScroll(){
            var winTop = jQuery(window).scrollTop();
            var winBottom = winTop + jQuery(window).height();

            $elements.each(function(){
                var $el = jQuery(this);
                if($el.hasClass('in-view')) return;
                var top = $el.offset().top;
                if(top < winBottom - 80){
                    $el.addClass('in-view');
                }
            });
        }
        jQuery(window).on('scroll resize', onScroll);
        onScroll();
    }
}

// MOBILE HEADER NAVIGATION SECTION (Mobile panel)
(function () {
    const mobileToggle  = document.getElementById("mobileToggle");
    const mobileMenu    = document.getElementById("mobileMenu");
    const musicToggle   = document.getElementById("music-toggle");
    const mobileHeader  = document.querySelector(".mobile-header");
    const menuBg        = document.querySelector(".mobile-menu-bg"); // ⭐ background layer

    function isMobile() {
        return window.innerWidth <= 980;
    }

    if (!mobileToggle || !mobileMenu) return;

    /* ⭐ Toggle background layer visibility */
    function showMenuBg(isOpen) {
        if (!menuBg) return;
        menuBg.classList.toggle("show", isOpen);
    }

    function closeMenu() {
        if (!isMobile()) return;

        mobileMenu.classList.remove("open");
        mobileToggle.classList.remove("active");
        document.body.style.overflow = "";

        if (mobileHeader) mobileHeader.classList.remove("hide");
        if (musicToggle)  musicToggle.classList.remove("hide");

        showMenuBg(false); // ⭐ hide background when closing
    }

    // HAMBURGER TOGGLE
    mobileToggle.addEventListener("click", function(e) {
        if (!isMobile()) return;
        e.stopPropagation();

        const isOpen = mobileMenu.classList.toggle("open");
        mobileToggle.classList.toggle("active", isOpen);

        showMenuBg(isOpen); // ⭐ SHOW / HIDE BG LAYER

        if (mobileHeader) mobileHeader.classList.toggle("hide", isOpen);
        if (musicToggle)  musicToggle.classList.toggle("hide", isOpen);

        document.body.style.overflow = isOpen ? "hidden" : "";

    });

    // SUPER-SENSITIVE OUTSIDE CLICK
    document.addEventListener("mousedown", function (e) {
        if (!isMobile()) return;
        if (!mobileMenu.classList.contains("open")) return;

        const insideMenu   = mobileMenu.contains(e.target);
        const onHamburger  = mobileToggle.contains(e.target);

        if (!insideMenu && !onHamburger) {
            closeMenu();
        }
    });

    // CLOSE WHEN A MENU LINK IS CLICKED
    document.querySelectorAll("#mobileMenu a").forEach(link => {
        link.addEventListener("click", function () {
            closeMenu();
        });
    });

})();  // END MOBILE MENU IIFE
 
// HEADER + MUSIC TOGGLE BEHAVIOUR ON SCROLL SECTION (Header & music toggle disappear behavior)
(function () {
    let lastScroll = 0;
    const siteHeader  = document.getElementById("siteHeader");
    const mobileHeader = document.querySelector(".mobile-header");
    const musicToggle = document.getElementById("music-toggle");
    const mobileMenu  = document.getElementById("mobileMenu");

window.addEventListener("scroll", function () {
    const curr = window.pageYOffset;

    // 🛑 STOP SCROLL EFFECTS when menu is open
    if (mobileMenu && mobileMenu.classList.contains("open")) {
        lastScroll = curr;
        return; 
    }

    const scrollingDown = curr > lastScroll && curr > 80;

    // header show / hide (desktop + mobile)
    if (scrollingDown) {
        if (siteHeader)  siteHeader.style.transform  = "translateY(-100%)";
        if (mobileHeader) mobileHeader.style.transform = "translateY(-100%)";
    } else {
        if (siteHeader)  siteHeader.style.transform  = "translateY(0)";
        if (mobileHeader) mobileHeader.style.transform = "translateY(0)";
    }

    // music button behaviour
    if (musicToggle) {
        if (scrollingDown && curr > 60) {
            musicToggle.classList.add("hide");
        } else {
            musicToggle.classList.remove("hide");
        }
    }

    lastScroll = curr;
});

})();

// DESKTOP & MOBILE HERO ANIMATIONS (Debut-safe, reusable)
document.addEventListener("DOMContentLoaded", function () {

  document.querySelectorAll("[data-hero]").forEach((heroSection, index) => {
    const heroImg = heroSection.querySelector(".hero-media img, .hero-img");
    const items = heroSection.querySelectorAll("[data-hero-item]");

    if (!items.length) return;

    // IMAGE FADE (optional)
    if (heroImg) {
      heroImg.style.opacity = "0";
      heroImg.style.transition = "opacity 1200ms ease";
      setTimeout(() => {
        heroImg.style.opacity = "1";
      }, 200 + index * 120);
    }

    // Reset items
    items.forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(12px)";
      el.style.filter = "blur(2px)";
      el.style.transition =
        "opacity 900ms ease, transform 900ms cubic-bezier(.2,.8,.2,1), filter 900ms ease";
      el.style.willChange = "opacity, transform, filter";
    });

    // Stagger reveal (3 items only now)
    const baseDelay = 900 + index * 120;
    items.forEach((el, i) => {
      setTimeout(() => {
        el.style.opacity = "1";
        el.style.transform = "translateY(0)";
        el.style.filter = "blur(0)";
      }, baseDelay + (i * 200));
    });
  });

});

// WELCOME SECTION ANIMATION (Fade-in animation)
document.addEventListener("DOMContentLoaded", function () {
    const welcomeSection = document.querySelector(".welcome-section");

    if (!welcomeSection) return;

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    welcomeSection.classList.add("show");
                    observer.unobserve(welcomeSection); // run once only
                }
            });
        },
        { threshold: 0.25 } // show when 25% of the section is visible
    );

    observer.observe(welcomeSection);
});

// RSVP TOAST NOTIFICATION SECTION (Part of RSVP FORM)
document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    if (params.get("rsvp") === "success") {
        const toast = document.getElementById("rsvp-toast");

        if (toast) {
            toast.classList.add("show");

            // Hide after 4 seconds
            setTimeout(() => {
                toast.classList.remove("show");
            }, 4000);

            // Remove ?rsvp=success from URL after showing
            setTimeout(() => {
                const newUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, "", newUrl);
            }, 4500);
        }
    }
});

// RSVP LOADER SECTION (Loading icon during the sending of RSVP) (Part of RSVP FORM)
jQuery(document).ready(function($) {
    $(".rsvp-form").on("submit", function() {
        // Show loader
        $("#rsvp-loader").css({
            opacity: "1",
            visibility: "visible"
        });

        // Disable all buttons to prevent double submissions
        $(this).find("button[type=submit]").prop("disabled", true);
    });
});

// SAFARI-FRIENDLY RSVP AUTO-SCROLL (Part of RSVP FORM)
let RSVP_DATA = [];
let rsvpTimer = null;
let rsvpTrack = null;

const RSVP_VISIBLE = 3;      // show 3 messages at a time
const RSVP_STEP_MS = 3000;   // slide every 3 seconds

// BUILD RSVP MESSAGE CARD (Part of RSVP FORM)
function rsvpMarkup(item) {
    const name = item.name || "?";
    const first = name.charAt(0).toUpperCase();
    const time = new Date(item.timestamp * 1000).toLocaleString("en-US");

    return `
        <div class="rsvp-msg-card">
            <div class="rsvp-avatar">${first}</div>

            <div class="rsvp-msg-main">
                <div class="rsvp-msg-top">
                    <div class="rsvp-msg-name">${name}</div>
                    <div class="rsvp-msg-time">${time}</div>
                </div>
                <div class="rsvp-msg-text">${item.message}</div>
            </div>
        </div>
    `;
}

/* Initial render */
function rsvpRender() {
    if (!rsvpTrack) return;

    rsvpTrack.style.transition = "none";
    rsvpTrack.style.transform = "translateY(0)";

    rsvpTrack.innerHTML = RSVP_DATA
        .slice(0, RSVP_VISIBLE)
        .map(rsvpMarkup)
        .join("");

    void rsvpTrack.offsetHeight;
    rsvpTrack.style.transition = "transform .6s ease";
}

// RSVP MESSAGES SLIDE ANIMATION (Part of RSVP FORM)
function startRSVPScroll() {
    stopRSVPScroll();
    if (!RSVP_DATA.length) return;

    rsvpRender();

    if (RSVP_DATA.length <= RSVP_VISIBLE) return;

    rsvpTimer = setInterval(() => {
        const firstHeight =
            rsvpTrack.children[0].offsetHeight + 22;

        rsvpTrack.style.transform = `translateY(-${firstHeight}px)`;

        rsvpTrack.addEventListener("transitionend", () => {
            rsvpTrack.style.transition = "none";
            rsvpTrack.style.transform = "translateY(0)";

            // Move first item to bottom
            const first = RSVP_DATA.shift();
            RSVP_DATA.push(first);

            rsvpTrack.innerHTML = RSVP_DATA
                .slice(0, RSVP_VISIBLE)
                .map(rsvpMarkup)
                .join("");

            void rsvpTrack.offsetHeight;
            rsvpTrack.style.transition = "transform .6s ease";
        }, { once: true });

    }, RSVP_STEP_MS);
}

function stopRSVPScroll() {
    if (rsvpTimer) clearInterval(rsvpTimer);
}

// LOAD RSVP MESSAGES FROM PHP (Part of RSVP FORM)
async function loadRSVPMessages() {
    rsvpTrack = document.querySelector(".rsvp-track");
    if (!rsvpTrack) return;

    try {
        const url = `${mgwData.ajaxUrl}?action=mgw_get_messages&_=${Date.now()}`;
        const res = await fetch(url);
        const json = await res.json();

        if (json?.success && Array.isArray(json.data.items)) {
            RSVP_DATA = json.data.items;
            startRSVPScroll();
        }

    } catch (e) {
        console.error("RSVP load error:", e);
    }
}
			
// GLOBAL MESSAGE CARD TEMPLATE (used by popup) (Part of RSVP FORM)
function messageCard(item) {

    function decodeHTML(str) {
        const txt = document.createElement("textarea");
        txt.innerHTML = str;
        return txt.value;
    }

    const initial = item.name ? item.name.trim().charAt(0).toUpperCase() : "?";

    const dt = new Date(item.timestamp * 1000);
    const timeString = dt.toLocaleString("en-US", {
        month: "2-digit",
        day: "2-digit",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit"
    }).replace(",", "");

    return `
        <div class="rsvp-msg-card">
            <div class="rsvp-avatar">${initial}</div>

            <div class="rsvp-msg-main">
                <div class="rsvp-msg-top">
                    <div class="rsvp-msg-name">${decodeHTML(item.name)}</div>
                    <div class="rsvp-msg-time">${timeString}</div>
                </div>
                <div class="rsvp-msg-text">${decodeHTML(item.message)}</div>
            </div>
        </div>
    `;
}
	
// VIEW ALL MESSAGES POPUP (Part of RSVP FORM)
document.addEventListener("click", async (e) => {
    const btn = e.target.closest("#viewAllBtn");
    if (!btn) return;

    e.preventDefault();

    const modal = document.getElementById("allMessagesModal");
    const list  = document.getElementById("allMsgList");

    if (!modal || !list) return;

    // fetch messages
    const url = `${mgwData.ajaxUrl}?action=mgw_get_messages&_=${Date.now()}`;
    const res = await fetch(url, { credentials:"same-origin" });
    const json = await res.json();

    if (!json?.success || !Array.isArray(json.data?.items)) return;

    // newest first
    const messages = [...json.data.items].sort((a,b) => b.timestamp - a.timestamp);

    list.innerHTML = messages
        .map(item => messageCard(item))
        .join("");

    modal.removeAttribute("hidden");
    document.body.classList.add("no-scroll");
});

// close modal
(function(){
    const modal = document.getElementById("allMessagesModal");
    if (!modal) return;

    const closeBtn =
    modal.querySelector(".all-msg-close") ||
    document.getElementById("closeAllMsg");

    function closeModal(){
        modal.setAttribute("hidden", "");
        document.body.classList.remove("no-scroll");
    }

    closeBtn.addEventListener("click", closeModal);

    modal.addEventListener("click", (e)=>{
        if (e.target === modal) closeModal();
    });

    document.addEventListener("keydown", (e)=>{
        if (e.key === "Escape" && !modal.hasAttribute("hidden")){
            closeModal();
        }
    });

})();
			
// MUSIC PLAYER SECTION
document.addEventListener("DOMContentLoaded", function () {
    const audio = document.getElementById("wedding-audio");
    const toggle = document.getElementById("music-toggle");
    let hasStarted = false;

    // --- Fade-in function ---
    function fadeIn(audioEl, duration = 3000) {
        let volume = 0;
        audioEl.volume = 0;
        const step = 50 / duration;

        const fade = setInterval(() => {
            volume += step;
            if (volume >= 1) {
                audioEl.volume = 1;
                clearInterval(fade);
            } else {
                audioEl.volume = volume;
            }
        }, 50);
    }

    // --- Function to start music ---
    function startMusic() {

        // *** Prevent double-start (recommended) ***
        if (audio.currentTime > 0 && !audio.paused) return;

        if (!hasStarted) {
            audio.play().then(() => {
                fadeIn(audio, 3000);
                toggle.classList.add("playing");
                toggle.dataset.tooltip = "Music On";
            }).catch(() => {});
            hasStarted = true;
        }
    }

    // --- MOBILE: Tap anywhere to play ---
    document.addEventListener("touchstart", () => {
        startMusic();
    }, { once: true });

    // --- DESKTOP: Autoplay on scroll ---
    window.addEventListener("scroll", () => {
        startMusic();
    }, { once: true });

    // --- TOGGLE BUTTON PLAY/PAUSE ---
    toggle.addEventListener("click", (e) => {
        e.stopPropagation();

        if (audio.paused) {
            audio.play();
            fadeIn(audio, 2000);
            toggle.classList.add("playing");
            toggle.dataset.tooltip = "Music On";
        } else {
            audio.pause();
            toggle.classList.remove("playing");
            toggle.dataset.tooltip = "Music Off";
        }
    });

    // --- SAFARI LOOP FIX (with fade restart) ---
    audio.addEventListener("ended", function () {
        audio.currentTime = 0;
        audio.play();
        fadeIn(audio, 1500); // smooth loop restart
    });
});

// OUR STORY ANIMATION SECTION
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".story-card");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("in-view"); // USE THE THEME'S CLASS
                entry.target.classList.add("show");    // YOUR CLASS
            }
        });
    }, { threshold: 0.2 });

    cards.forEach(card => observer.observe(card));
});

// Init scripts when DOM is ready
jQuery(document).ready(function($){
    initCountdown();
    initFlipbooksAndUnifiedLightbox();;
    initAccordion();
    initScrollAnimations();
    loadRSVPMessages();  
});