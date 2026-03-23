// ------------------------------
// DEVICE DETECTION (GLOBAL)
// ------------------------------
const isIOS = /iPhone|iPad|iPod/i.test(navigator.userAgent);

// ------------------------------
// AUDIO STATE (GLOBAL)
// ------------------------------
let musicUnlocked = false;


// OPENING SCREEN + HERO ANIMATION
document.addEventListener("DOMContentLoaded", function () {
  const openBtn = document.getElementById("open-invitation-btn");
  const opening = document.getElementById("opening-screen");
  const heroSections = document.querySelectorAll("[data-hero]");

  let openingInProgress = false;
  let heroObserver = null;

  function animateHero(heroSection, index) {
    if (!heroSection || heroSection.dataset.heroAnimated === "true") return;
    heroSection.dataset.heroAnimated = "true";

    const heroImg = heroSection.querySelector(".hero-img");
    const items = heroSection.querySelectorAll("[data-hero-item]");

    // Image reveal
    if (heroImg) {
      heroImg.style.opacity = "0";
      heroImg.style.transform = "scale(1.06)";
      heroImg.style.transition = "opacity 1400ms ease, transform 1800ms ease";

      setTimeout(() => {
        heroImg.style.opacity = "1";
        heroImg.style.transform = "scale(1.02)";
      }, 120);
    }

    // Reset text items first
    items.forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(18px)";
      el.style.filter = "blur(4px)";
      el.style.transition =
        "opacity 1000ms ease, transform 1000ms cubic-bezier(.2,.8,.2,1), filter 1000ms ease";
      el.style.willChange = "opacity, transform, filter";
    });

    // Stagger reveal
    const baseDelay = 380 + index * 100;

    items.forEach((el, i) => {
      setTimeout(() => {
        el.style.opacity = "1";
        el.style.transform = "translateY(0)";
        el.style.filter = "blur(0)";
      }, baseDelay + i * 220);
    });
  }

  function runHeroAnimations() {
    if (!heroSections.length) return;

    // disconnect previous observer if any
    if (heroObserver) {
      heroObserver.disconnect();
      heroObserver = null;
    }

    if ("IntersectionObserver" in window) {
      heroObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const heroSection = entry.target;
            const index = Array.from(heroSections).indexOf(heroSection);
            animateHero(heroSection, index);
            heroObserver.unobserve(heroSection);
          });
        },
        {
          threshold: 0.35
        }
      );

      heroSections.forEach((section) => {
        if (section.dataset.heroAnimated !== "true") {
          heroObserver.observe(section);
        }
      });
    } else {
      heroSections.forEach((section, index) => animateHero(section, index));
    }
  }

  // expose globally because you call it later
  window.runHeroAnimations = runHeroAnimations;

  /* ---------------------------------
     SKIP OPENING IF ALREADY OPENED
  ---------------------------------- */
  if (sessionStorage.getItem("invitationOpened") === "yes") {
    if (opening) opening.remove();
    document.body.classList.remove("opening-active");

    const toggle = document.getElementById("music-toggle");
    if (toggle) {
      toggle.style.opacity = "1";
      toggle.style.pointerEvents = "auto";
    }

    // run hero only after opening screen is gone
    runHeroAnimations();
    return;
  }

  /* ---------------------------------
     LOCK UI WHILE OPENING IS VISIBLE
  ---------------------------------- */
  document.body.classList.add("opening-active");

  // Safety
  if (!openBtn || !opening) {
    document.body.classList.remove("opening-active");
    runHeroAnimations();
    return;
  }

  /* ---------------------------------
     OPEN INVITATION CLICK
  ---------------------------------- */
  openBtn.addEventListener("click", function () {
    if (openingInProgress) return;
    openingInProgress = true;

    sessionStorage.setItem("invitationOpened", "yes");
    document.dispatchEvent(new Event("wedding:unlock-music"));

    opening.style.transition = "opacity 1s ease";
    opening.style.opacity = "0";

    setTimeout(() => {
      if (opening && opening.parentNode) {
        opening.remove();
      }

      document.body.classList.remove("opening-active");

      const toggle = document.getElementById("music-toggle");
      if (toggle) {
        toggle.style.opacity = "1";
        toggle.style.pointerEvents = "auto";
      }

      // NOW start hero animations
      runHeroAnimations();
    }, 1000);
  });
});

// MESSAGE DEBUTANTE REVEAL
document.addEventListener("DOMContentLoaded", function () {
  const debutanteSection = document.querySelector(".message-debutante-section.js-animate");
  if (!debutanteSection) return;

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          debutanteSection.classList.add("is-visible");
          observer.unobserve(debutanteSection);
        });
      },
      {
        threshold: 0.2
      }
    );

    observer.observe(debutanteSection);
  } else {
    debutanteSection.classList.add("is-visible");
  }
});

// // COUNTDOWN SECTION
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

// COUNTDOWN SECTION REVEAL
document.addEventListener("DOMContentLoaded", function () {
  const countdownSection = document.querySelector(".js-countdown-reveal");
  if (!countdownSection) return;

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          countdownSection.classList.add("is-visible");
          observer.unobserve(countdownSection);
        });
      },
      {
        threshold: 0.18
      }
    );

    observer.observe(countdownSection);
  } else {
    countdownSection.classList.add("is-visible");
  }
});

// GALLERY & ENTOURAGE LIGHTBOX SECTION
function initGallery() {
    var $overlay = jQuery('.lightbox-overlay');
    
    // Create overlay if missing
    if (!$overlay.length) {
        $overlay = jQuery(`
            <div class="lightbox-overlay">
                <div class="lightbox-content">
                    <span class="lightbox-arrow left">&#10094;</span>
                    <img class="lightbox-image" src="" alt="">
                    <span class="lightbox-arrow right">&#10095;</span>
                </div>
            </div>
        `);
        jQuery('body').append($overlay);
    }

    // 🔥 FIXED → now includes entourage images
    var $items = jQuery('.gallery-item, .entourage-item');

    var $image = $overlay.find('.lightbox-image');
    var index = 0;

    // Open image
    $items.on('click', function () {
        index = $items.index(this);
        var src = jQuery(this).data('full-image');

        $image.removeClass("fade-in");
        $image.attr('src', src);

        setTimeout(() => $image.addClass("fade-in"), 30);
        $overlay.addClass('active');
    });

    // Close
    $overlay.on('click', function (e) {
        if (e.target === this) $overlay.removeClass('active');
    });

    // Fade transition
    function showImage(i) {
        const newSrc = jQuery($items[i]).data('full-image');

        $image.removeClass('fade-in');

        setTimeout(() => {
            $image.attr('src', newSrc);
            setTimeout(() => $image.addClass('fade-in'), 30);
        }, 150);
    }

    // Next
    $overlay.find('.lightbox-arrow.right').on('click', function (e) {
        e.stopPropagation();
        index = (index + 1) % $items.length;
        showImage(index);
    });

    // Prev
    $overlay.find('.lightbox-arrow.left').on('click', function (e) {
        e.stopPropagation();
        index = (index - 1 + $items.length) % $items.length;
        showImage(index);
    });
	
	// Close button
$overlay.find('.lightbox-close').on('click', function (e) {
    e.stopPropagation();
    $overlay.removeClass('active');
});
}

// GALLERY + ENTOURAGE SCROLL REVEAL
document.addEventListener("DOMContentLoaded", function () {
  const revealItems = document.querySelectorAll(".js-gallery-item, .js-entourage-item");
  if (!revealItems.length) return;

  // add stagger delay
  revealItems.forEach((item, index) => {
    const stagger = (index % 3) * 120; // nice stagger per row
    item.style.setProperty("--reveal-delay", `${stagger}ms`);
  });

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        });
      },
      {
        threshold: 0.18,
        rootMargin: "0px 0px -40px 0px"
      }
    );

    revealItems.forEach((item) => observer.observe(item));
  } else {
    // fallback
    revealItems.forEach((item) => item.classList.add("is-visible"));
  }
});

/* ===============================
   PALETTE SCROLL ANIMATION
=============================== */

document.addEventListener("DOMContentLoaded", function () {

    const palettes = document.querySelectorAll(".js-animate-palette");
    if (!palettes.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target); // animate once
            }
        });
    }, {
        threshold: 0.3
    });

    palettes.forEach((palette) => {
        observer.observe(palette);
    });

});

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


// WELCOME SECTION REVEAL — PREMIUM STAGGER
document.addEventListener("DOMContentLoaded", function () {
  const welcomeSection = document.querySelector(".js-welcome-animate");
  if (!welcomeSection) return;

  const items = welcomeSection.querySelectorAll(
    ".welcome-box, .welcome-kicker, .welcome-text, .welcome-name"
  );

  // Initial state (prevents flash)
  items.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(24px)";
    el.style.filter = "blur(3px)";
    el.style.transition =
      "opacity 900ms ease, transform 900ms cubic-bezier(.2,.8,.2,1), filter 900ms ease";
    el.style.willChange = "opacity, transform, filter";
  });

  const reveal = () => {
    items.forEach((el, i) => {
      setTimeout(() => {
        el.style.opacity = "1";
        el.style.transform = "translateY(0)";
        el.style.filter = "blur(0)";
      }, i * 160); // stagger timing
    });
  };

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          reveal();
          observer.unobserve(welcomeSection);
        });
      },
      {
        threshold: 0.25
      }
    );

    observer.observe(welcomeSection);
  } else {
    reveal();
  }
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
    const audio  = document.getElementById("wedding-audio");
    const toggle = document.getElementById("music-toggle");

    let hasStarted = false;
    let userInteracted = false;
    let scrollGestureUsed = false;

    const isAndroid = /Android/i.test(navigator.userAgent);

    // ------------------------------
    // ANDROID-ONLY MUTED AUTOPLAY
    // ------------------------------
		if (isAndroid && !sessionStorage.getItem("androidPrimed")) {

			audio.muted = true;
			audio.volume = 0;
			audio.preload = "auto";

			audio.play()
				.then(() => {
					audio.pause();
					audio.currentTime = 0;

					sessionStorage.setItem("androidPrimed", "yes");
				})
				.catch(() => {});
		}

    // ------------------------------
    // UNLOCK MUSIC (shared)
    // ------------------------------
		function unlockMusic() {

			// 🔒 iOS: allow ONLY ONCE
			if (isIOS && musicUnlocked) return;

			// already playing? do nothing
			if (!audio.paused) return;

			audio.play().then(() => {

				audio.muted = false;
				audio.volume = 1;

				toggle.classList.add("playing");
				toggle.dataset.tooltip = "Music On";

				musicUnlocked = true;
				userInteracted = true;

			}).catch(() => {});
		}
		
			// 🔊 Unlock music when Open Invitation button is clicked
			document.addEventListener("wedding:unlock-music", () => {
				unlockMusic();
			}, { passive: true });		

    // ------------------------------
    // SCROLL-AS-FIRST-GESTURE (ANDROID)
    // ------------------------------
    function unlockOnScrollGesture() {
        if (!userInteracted && !scrollGestureUsed) {
            scrollGestureUsed = true;
            unlockMusic();
        }
    }


    // ------------------------------
    // DESKTOP SCROLL AUTOSTART
    // ------------------------------
	if (!/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
		window.addEventListener("scroll", () => {
			unlockMusic();
		}, { passive: true, once: true });
	}
    // ------------------------------
    // TOGGLE BUTTON
    // ------------------------------
		toggle.addEventListener("click", (e) => {
			e.stopPropagation();

			if (audio.paused) {
				audio.play().catch(() => {});
				audio.muted = false;
				audio.volume = 1;
				toggle.classList.add("playing");
				toggle.dataset.tooltip = "Music On";
			} else {
				audio.pause();
				toggle.classList.remove("playing");
				toggle.dataset.tooltip = "Music Off";
			}
		});
});
	
// FOOTER SCROLL REVEAL
document.addEventListener("DOMContentLoaded", function () {
  const footer = document.querySelector(".js-footer-reveal");
  const footerItems = document.querySelectorAll(".js-footer-item");

  if (!footer || !footerItems.length) return;

  // set stagger delay
  footerItems.forEach((item, index) => {
    item.style.setProperty("--footer-delay", `${index * 160}ms`);
  });

  const revealFooter = () => {
    footerItems.forEach((item) => {
      item.classList.add("is-visible");
    });
  };

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          revealFooter();
          observer.unobserve(footer);
        });
      },
      {
        threshold: 0.15,
        rootMargin: "0px 0px -40px 0px"
      }
    );

    observer.observe(footer);
  } else {
    revealFooter();
  }
});	

// Init scripts when DOM is ready
jQuery(document).ready(function($){
    initCountdown();
    initAccordion();
	initGallery();
    initScrollAnimations();
    loadRSVPMessages();  
});