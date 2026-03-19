<?php
/**
 * Front page template
 */
get_header();
?>

<main>

<!-- DESKTOP HERO SECTION -->
<section class="hero hero-desktop" data-hero>
  <div class="hero-media">
    <img
      class="hero-img"
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-placeholder.jpg"
      alt="Mia Kirsten debut hero (desktop)"
    >
  </div>

  <div class="hero-overlay">
    <div class="hero-content">
      <div class="hero-kicker" data-hero-item>DEBUT CELEBRATION</div>

      <h1 class="hero-title" data-hero-item>
        Mia <span class="hero-title-accent">Kirsten</span>
      </h1>

      <div class="hero-subtitle" data-hero-item>
        A Night<br class="only-desktop"> to Remember
      </div>
    </div>
  </div>
</section>

<!-- MOBILE HERO SECTION -->
<section class="hero hero-mobile" data-hero>
  <div class="hero-media">
    <img
      class="hero-img"
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-mobile.jpg"
      alt="Mia Kirsten debut hero (mobile)"
    >
  </div>

  <div class="hero-overlay">
    <div class="hero-content">
      <div class="hero-kicker" data-hero-item>DEBUT CELEBRATION</div>

      <h1 class="hero-title" data-hero-item>
        Mia <span class="hero-title-accent">Kirsten</span>
      </h1>

      <div class="hero-subtitle" data-hero-item>
        A Night<br>to Remember
      </div>
    </div>
  </div>
</section>
	
<!-- A MESSAGE FROM THE DEBUTANTE -->
<section id="message-debutante" class="message-debutante-section js-animate">
  <div class="message-debutante-shell">

    <div class="message-debutante-header">
      <div class="message-debutante-kicker">A Message From the Debutante</div>
      <h2 class="message-debutante-title">With a Grateful Heart</h2>
      <div class="message-debutante-divider"></div>
    </div>

    <div class="message-debutante-card">
      <div class="message-debutante-mark">“</div>

      <div class="message-debutante-body">
		<p class="debutante-text has-dropcap">
		  <span class="dropcap">E</span>ighteen feels like a beautiful beginning — a moment I have dreamed of, prayed for, and looked forward to with so much gratitude in my heart.
		</p>

	<p class="debutante-text">
	  As I step into this special chapter of my life, I carry with me the love, guidance, and memories that have shaped who I am today. This celebration is not only about turning eighteen, but about honoring the journey that brought me here and the people who have been part of it.
	</p>

	<p class="debutante-text">
	  Thank you for being here, for sharing in this once-in-a-lifetime moment,
	  and for making this day even more meaningful with your presence, love,
	  and prayers. I will always treasure this night and the memories we create
	  together.
	</p>
      </div>

      <div class="message-debutante-footer">
        <div class="message-debutante-signoff">With love,</div>
        <div class="message-debutante-signature">Mia Kirsten</div>
      </div>
    </div>

  </div>
</section>	
	
<!-- HER STORY SECTION -->
<section class="her-story-section js-animate" id="her-story">
  <div class="her-story-wrap">

    <header class="her-story-header">
      <div class="her-story-kicker">A chapter worth celebrating</div>

      <div class="her-story-title-row">
        <h2 class="her-story-title">Her Story</h2>
      </div>

      <div class="her-story-divider" aria-hidden="true"></div>
    </header>

    <div class="her-story-grid">

      <!-- LEFT: Featured portrait -->
      <figure class="her-story-feature">
        <div class="her-story-frame" aria-hidden="true"></div>
        <img
          src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gallery-6.jpg"
          alt="Portrait of Mia Kirsten"
          loading="lazy"
        >
      </figure>

      <!-- RIGHT: Editorial content -->
      <div class="her-story-content">

        <!-- Decorative corner -->
        <div class="her-story-corner" aria-hidden="true"></div>

        <div class="her-story-text">
          <p class="hs-dropcap">
            From the very beginning, she was a spark of light — gentle yet strong, quiet yet full of dreams.
            With every year that passed, she grew not only in age, but in grace, kindness, and courage.
          </p>

          <p>
            She learned to stand tall through challenges, to laugh freely in moments of joy, and to chase her dreams
            with a heart full of determination. Guided by love, shaped by experience, and inspired by the people
            around her, she slowly blossomed into the young woman she is today.
          </p>

          <!-- Pull quote / highlight card -->
          <div class="her-story-quote">
            <div class="hs-quote-mark" aria-hidden="true">“</div>
            <div class="hs-quote-text">
              As she turns eighteen, she embraces this new chapter with confidence and gratitude —
              carrying with her the lessons of yesterday and the promise of tomorrow.
            </div>
            <div class="hs-quote-line" aria-hidden="true"></div>
          </div>
        </div>

        <!-- Supporting photos (curated accents, not a gallery) -->
        <div class="her-story-photos">
          <figure class="her-story-photo polaroid polaroid-a">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gallery-4.jpg"
              alt="Mia Kirsten smiling"
              loading="lazy"
            >
            <figcaption>Golden moments</figcaption>
          </figure>

          <figure class="her-story-photo polaroid polaroid-b">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gallery-5.jpg"
              alt="Mia Kirsten candid moment"
              loading="lazy"
            >
            <figcaption>Forever cherished</figcaption>
          </figure>
        </div>

      </div>
    </div>

  </div>
</section>
	
<!-- COUNTDOWN SECTION -->
<section class="date-countdown js-animate">

    <!-- Background Video -->
    <video class="countdown-bg-video" autoplay muted loop playsinline>
        <source src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/video/countdown-bg.mp4" type="video/mp4">
    </video>

    <!-- Top Floral -->
    <div class="countdown-floral top">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/floral-top.webp" alt="Floral Divider Top">
    </div>

    <div class="wedding-date">SUNDAY <br/>
		21st JUNE 2026</div>

    <hr class="countdown-divider">

    <div class="ceremony-reception">

        <div class="event-block">
            <div class="event-title">THE CEREMONY</div>
            <div class="event-sub">1:00 PM</div>
            <p>San Isidro Labrador Parish Church</p>
        </div>

        <hr class="countdown-inner-line">

        <div class="event-block">
            <div class="event-title">THE RECEPTION</div>
            <div class="event-sub">4:00 PM</div>
            <p>The Peninsula Manila</p>
        </div>

    </div>

    <div class="countdown" data-target="2026-06-21T13:00:00">
        <div class="time-box">
            <div class="time-number js-countdown-days">0</div>
            <div class="time-label">Days</div>
        </div>
        <div class="time-box">
            <div class="time-number js-countdown-hours">0</div>
            <div class="time-label">Hours</div>
        </div>
        <div class="time-box">
            <div class="time-number js-countdown-minutes">0</div>
            <div class="time-label">Minutes</div>
        </div>
        <div class="time-box">
            <div class="time-number js-countdown-seconds">0</div>
            <div class="time-label">Seconds</div>
        </div>
    </div>

    <!-- Bottom Floral -->
    <div class="countdown-floral bottom">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/floral-bottom.webp" alt="Floral Divider Bottom">
    </div>

</section>
	
<!-- GALLERY SECTION (Editorial Flipbook) -->
<section id="gallery" class="gallery-section js-animate">
  <div class="gallery-header">
    <div>
      <div class="section-label">Turning Eighteen</div>
      <h2>Moments Worth Celebrating</h2>
    </div>
  </div>

  <div class="flipbook" data-flipbook>
    <!-- Desktop arrows (outside, minimal) -->
    <button class="flip-nav flip-prev" type="button" aria-label="Previous">
      <span aria-hidden="true">‹</span>
    </button>

    <div class="flipbook-shell">
      <div class="flipbook-spine" aria-hidden="true"></div>

      <div class="flipbook-spread" data-spread></div>

      <!-- Mobile arrows (overlay on photo) -->
      <button class="flip-nav flip-prev flip-nav--overlay" type="button" aria-label="Previous">
        <span aria-hidden="true">‹</span>
      </button>

      <button class="flip-nav flip-next flip-nav--overlay" type="button" aria-label="Next">
        <span aria-hidden="true">›</span>
      </button>
    </div>
	  
	<div class="flipbook-meta">
	  <div class="flipbook-dots" aria-hidden="true"></div>
	  <div class="flipbook-counter" aria-live="polite"></div>
	</div> 

    <button class="flip-nav flip-next" type="button" aria-label="Next">
      <span aria-hidden="true">›</span>
    </button>
  </div>

  <!-- Hidden source items (JS reads these and builds spreads) -->
  <div class="flipbook-source" hidden>
    <?php for ($i = 1; $i <= 12; $i++) : ?>
      <?php
        $folder = '/assets/img/';
        $filename = 'gallery-' . $i . '.jpg';
        $img = get_template_directory_uri() . $folder . $filename;
      ?>
      <div
        class="gallery-item"
        data-full-image="<?php echo esc_url($img); ?>"
        data-thumb="<?php echo esc_url($img); ?>"
        aria-label="Gallery image <?php echo (int) $i; ?>"
      ></div>
    <?php endfor; ?>
  </div>
</section>
	
<div class="lightbox-overlay">
  <div class="lightbox-content">
    <button class="lightbox-close" type="button" aria-label="Close lightbox">&times;</button>
    <span class="lightbox-arrow left">&#10094;</span>
    <img class="lightbox-image" src="" alt="">
    <span class="lightbox-arrow right">&#10095;</span>
  </div>
</div>
	
<!-- ENTOURAGE SECTION -->
<section id="entourage" class="gallery-section js-animate">
  <div class="gallery-header">
    <div>
      <div class="section-label">With Hearts Beside Her</div>
      <h2>Debut Entourage</h2>
    </div>
  </div>

  <div class="flipbook" data-flipbook-entourage>
    <!-- Desktop arrows -->
    <button class="flip-nav flip-prev" type="button" aria-label="Previous">
      <span aria-hidden="true">‹</span>
    </button>

    <div class="flipbook-shell">
      <div class="flipbook-spine" aria-hidden="true"></div>

      <div class="flipbook-spread" data-spread></div>

      <!-- Mobile arrows (overlay) -->
      <button class="flip-nav flip-prev flip-nav--overlay" type="button" aria-label="Previous">
        <span aria-hidden="true">‹</span>
      </button>

      <button class="flip-nav flip-next flip-nav--overlay" type="button" aria-label="Next">
        <span aria-hidden="true">›</span>
      </button>
    </div>
	  
	<div class="flipbook-meta">
	  <div class="flipbook-dots" aria-hidden="true"></div>
	  <div class="flipbook-counter" aria-live="polite"></div>
	</div> 

    <button class="flip-nav flip-next" type="button" aria-label="Next">
      <span aria-hidden="true">›</span>
    </button>
  </div>

  <!-- Hidden source items -->
  <div class="entourage-source" hidden>
    <?php for ($i = 1; $i <= 7; $i++) : ?>
      <?php
        $folder = '/assets/img/';
        $filename = 'entourage-' . $i . '.jpg';
        $img = get_template_directory_uri() . $folder . $filename;
      ?>
      <!-- IMPORTANT: keep gallery-item so the same flipbook/lightbox styling works -->
      <div
        class="gallery-item entourage-item"
        data-full-image="<?php echo esc_url($img); ?>"
        data-thumb="<?php echo esc_url($img); ?>"
        aria-label="Entourage photo <?php echo (int) $i; ?>"
      ></div>
    <?php endfor; ?>
  </div>
</section>

<!-- RSVP SECTION -->
<section class="rsvp-section js-animate" id="rsvp">

    <!-- Background Image -->
    <div class="rsvp-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rsvp-bg.jpg" alt="RSVP Background">
    </div>

    <!-- Content wrapper (needed!!) -->
    <div class="rsvp-inner">

        <div class="section-label">Save The Date</div>
        <h2 class="rsvp-title">We Can't Wait To See You!</h2>
        <p class="rsvp-subtext">Please RSVP before June 1st, 2026. We would love to know if you will celebrate with us.</p>

    <form class="rsvp-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="mgw_rsvp">
            <input type="hidden" name="mgw_rsvp_nonce" value="<?php echo wp_create_nonce('mgw_rsvp_submit'); ?>">
	<!-- Honeypot (spam protection) -->
	<input type="text" name="mgw_hp" value="" style="display:none">

        <div class="rsvp-form-row">
            <div class="field">
                <label for="mgw_name">Your Name</label>
                <input type="text" id="mgw_name" name="mgw_name" required>
            </div>
        </div>

        <div class="rsvp-form-row">
            <div class="field">
                <label for="mgw_email">Email</label>
                <input type="email" id="mgw_email" name="mgw_email" maxlength="50">
            </div>
            <div class="field">
                <label for="mgw_guests">Guests</label>
                <select id="mgw_guests" name="mgw_guests">
                    <option value="Just Me">Just Me</option>
                    <option value="Me + 1 Guest">Me + 1 Guest</option>
                </select>
            </div>
        </div>

        <div class="rsvp-form-row">
            <div class="field">
                <label for="mgw_confirmation">Will You Be Attending?</label>
                <select id="mgw_confirmation" name="mgw_confirmation">
                    <option value="Happily Attending">Happily Attending</option>
                    <option value="Regretfully Unable To Attend">Regretfully Unable To Attend</option>
                </select>
            </div>
        </div>

        <div class="rsvp-form-row">
            <div class="field">
                <label for="mgw_message">Your Message</label>
                <textarea id="mgw_message" name="mgw_message" placeholder="Your words are gifts we'll treasure forever. We'd love to hear your wishes as we step into forever." maxlength="500"></textarea>
            </div>
        </div>

        <button type="submit" class="rsvp-submit">Send RSVP ✦</button>
    </form>
	
        <!-- RSVP MESSAGES SECTION -->
        <div id="rsvp-messages-wrapper">
            <div class="rsvp-list">
                <div class="rsvp-track"></div>
            </div>
        </div>
		
		<!-- VIEW ALL MESSAGES BUTTON -->
<div class="view-all-container">
    <button id="viewAllBtn" class="view-all-btn" type="button">View All Messages</button>
</div>

    </div> <!-- end inner -->

</section>
		
<!-- FULLSCREEN POPUP -->
<div id="allMessagesModal" class="all-msg-modal" hidden>
    <div class="all-msg-panel">

        <div class="all-msg-header">
            <h3 class="all-msg-title">All Messages</h3>
            <button class="all-msg-close" id="closeAllMsg">✕</button>
        </div>

        <div class="all-msg-list" id="allMsgList"></div>

    </div>
</div>
	
	<div id="rsvp-toast" class="rsvp-toast">Thank you! Your RSVP has been received.</div>


    <!-- EVENT INFORMATION SECTION -->
    <section id="eventinformation" class="event-info-section js-animate">
        <div class="event-info-grid">
            <div>
                <div class="section-label">Your Questions, Answered</div>
                <h2>Event Information</h2>
                <p class="lead">We're here to ensure that you have all the information you need to fully enjoy this special day with us.</p>

                <div class="event-accordion">
                    <div class="event-accordion-item">
                        <div class="event-accordion-header active" data-target="panel-ceremony">
                            <span>Ceremony And Reception Details</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="event-accordion-item">
                        <div class="event-accordion-header" data-target="panel-dresscode">
                            <span>Dress Code And Attire</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="event-accordion-item">
                        <div class="event-accordion-header" data-target="panel-gifts">
                            <span>Gift Note</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                </div>
            </div>
			
			<!-- CEREMONY & RECEPTION -->
			
            <div class="event-info-content-panel">
<div class="event-panel active" id="panel-ceremony" style="max-height:920px; overflow-y:auto; padding-right:12px;">

    <!-- Ceremony -->
    <div class="event-info-block">
        <div class="event-location-title">San Isidro Labrador Parish Church</div>
        <div class="event-time">1:00 PM</div>

        <div class="event-map-wrapper">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d489.7743332080499!2d120.99597533474541!3d14.558073665740334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ae695670d%3A0x174f3ba90151bd32!2sSan%20Isidro%20Labrador%20Parish%20Church%20-%2044%2C%20Pasay%20City%20(Archdiocese%20of%20Manila)!5e1!3m2!1sen!2sph!4v1772469994115!5m2!1sen!2sph" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <a class="event-map-link"
           href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d489.7743332080499!2d120.99597533474541!3d14.558073665740334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ae695670d%3A0x174f3ba90151bd32!2sSan%20Isidro%20Labrador%20Parish%20Church%20-%2044%2C%20Pasay%20City%20(Archdiocese%20of%20Manila)!5e1!3m2!1sen!2sph!4v1772469994115!5m2!1sen!2sph"
           target="_blank" rel="noopener">
           Open in Maps →
        </a>
    </div>

    <!-- Reception -->
    <div class="event-info-block">
        <div class="event-location-title">The Peninsula Manila</div>
        <div class="event-time">4:00 PM</div>

        <div class="event-map-wrapper">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d653.7775719136099!2d121.02420501141174!3d14.555622333512623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c908ef6e5a3f%3A0x900d87edb05dd155!2sThe%20Peninsula%20Manila!5e1!3m2!1sen!2sph!4v1772469882695!5m2!1sen!2sph" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <a class="event-map-link"
           href="https://maps.app.goo.gl/gBNYYrTrzshvFCtL7"
           target="_blank" rel="noopener">
           Open in Maps →
        </a>
    </div>

</div>
				
				<!-- DRESS CODE -->
				
<div class="event-panel" id="panel-dresscode">
	
	

    <!-- Scrollable wrapper -->
    <div class="dresscode-scroll">

        <!-- ==========================
             BLOCK 1 — NINONG & NINANG
        =========================== -->
        <div class="dresscode-row">
            <!-- Ninong -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Ninong</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#000000;"></div>
                    </div>
                    <div class="palette-caption">Barong (light cream) with black pants.</div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/ninong.jpg">
                </div>
            </div>

            <!-- Ninang -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Ninang</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#582f0e;"></div>
                    </div>
                    <div class="palette-caption">Formal dress in light cream and beige colors.</div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/ninang.jpg">
                </div>
            </div>
        </div>


        <!-- ==========================
             BLOCK 2 — GROOMSMEN + BRIDESMAID
        =========================== -->
        <div class="dresscode-row">
            <!-- Groomsmen -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Groomsmen</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#582f0e;"></div>
                    </div>
                    <div class="palette-caption">White long sleeves, beige suspender and bow tie, beige pants </div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/groomsmen.jpg">
                </div>
            </div>

            <!-- Bridesmaid -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Bridesmaids</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#582f0e;"></div>
                    </div>
                    <div class="palette-caption">Elegant formal dress in light cream and beige colors.</div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bridesmaids.jpg">
                </div>
            </div>
        </div>


        <!-- ==========================
             BLOCK 3 — GUEST (MEN + WOMEN)
        =========================== -->
        <div class="dresscode-row">
            <!-- Guest Men -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Guest (Men)</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#582f0e;"></div>
                    </div>
                    <div class="palette-caption">Semi-formal: mocha, dark brown, champagne, beige, cream.</div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/guests-men.webp">
                </div>
            </div>

            <!-- Guest Women -->
            <div class="dresscode-column">
                <div class="palette-group">
                    <div class="palette-group-title">Guest (Women)</div>
                    <div class="palette-row">
                        <div class="palette-swatch" style="background-color:#E8CEB5;"></div>
                        <div class="palette-swatch" style="background-color:#ddb892;"></div>
                        <div class="palette-swatch" style="background-color:#582f0e;"></div>
                    </div>
                    <div class="palette-caption">Semi-formal: mocha, dark brown, champagne, beige, cream.</div>
                </div>
                <div class="dresscode-photo">
                    <img class="dresscode-img"
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/guests-women.webp">
                </div>
            </div>
        </div>

    </div><!-- end scroll wrapper -->

</div>
				
				<!-- GIFT NOTE -->
				
<div class="event-panel" id="panel-gifts">
<div class="gift-note-wrapper">

    <div class="gift-floral top">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gift-top.webp" alt="">
    </div>

    <p class="gift-note-text">
        With all that we have, we are truly blessed.<br>
        Your presence and prayer are all that we request.<br>
        But if you desire to give nonetheless,<br>
        <span class="gift-highlight">a monetary gift is one we suggest.</span>
    </p>

    <div class="gift-floral bottom">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gift-bottom.webp" alt="">
    </div>

</div>
        </div>
    </section>

</main>

<?php
get_footer();
?>