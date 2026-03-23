<?php
/**
 * Front page template
 */
get_header();
?>

<!-- OPENING SCREEN SECTION -->
<div id="opening-screen">

    <!-- Visual stage -->
    <div class="opening-stage">
        <div class="opening-panel opening-panel-left">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery-6.jpg" alt="Mia Kirsten opening left">
        </div>

        <div class="opening-panel opening-panel-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery-5.jpg" alt="Mia Kirsten opening center">
        </div>

        <div class="opening-panel opening-panel-right">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery-4.jpg" alt="Mia Kirsten opening right">
        </div>
    </div>

    <!-- Overlay -->
    <div class="opening-overlay"></div>

    <!-- Center Content -->
    <div class="opening-content">
        <div class="opening-editorial">
            <div class="opening-topline"></div>
            <div class="opening-kicker">A Night to Remember</div>
            <h1 class="opening-title">Mia Kirsten</h1>
            <div class="opening-subtitle">XVIII</div>

            <button id="open-invitation-btn">Open Invitation</button>
        </div>
    </div>

</div>

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

      <div class="hero-kicker" data-hero-item>
        A Night to Remember
      </div>

      <h1 class="hero-title" data-hero-item>
        Mia Kirsten
      </h1>

      <div class="hero-topline" data-hero-item></div>

      <div class="hero-subtitle" data-hero-item>
        XVIII
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

      <div class="hero-kicker" data-hero-item>
        A Night to Remember
      </div>

      <h1 class="hero-title" data-hero-item>
        Mia Kirsten
      </h1>

      <div class="hero-topline" data-hero-item></div>

      <div class="hero-subtitle" data-hero-item>
        XVIII
      </div>

    </div>
  </div>
</section>

<!-- WELCOME MESSAGE SECTION -->
<section class="welcome-section js-welcome-animate">
  <div class="welcome-wrap">

    <div class="welcome-accent"></div>

    <div class="welcome-content">
		<div class="welcome-box">
		  <div class="welcome-kicker">Welcome</div>

		  <p class="welcome-text">
			<span class="welcome-lead">With love in my heart,</span>
			I invite you to celebrate this beautiful milestone with me — as I step into eighteen and embrace the woman I am becoming.
		  </p>

		  <div class="welcome-name">Mia Kirsten</div>
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
    </div>

    <div class="message-debutante-card">

      <div class="message-debutante-grid">

        <!-- LEFT / PHOTO -->
        <figure class="message-debutante-photo">
          <div class="message-debutante-photo-frame"></div>
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/message-photo.jpg"
            alt="Portrait of Mia Kirsten"
            loading="lazy"
          >
        </figure>

        <!-- RIGHT / TEXT -->
        <div class="message-debutante-content">
          <div class="message-debutante-body">
            <p class="debutante-text has-dropcap">
              <span class="dropcap">E</span>ighteen feels like a beautiful beginning — a moment I have dreamed of, prayed for, and looked forward to with so much gratitude in my heart.
            </p>

            <p class="debutante-text">
              As I step into this special chapter of my life, I carry with me the love, guidance, and memories that have shaped who I am today. This celebration is not only about turning eighteen, but about honoring the journey that brought me here and the people who have been part of it.
            </p>

            <p class="debutante-text">
              Thank you for being here, for sharing in this once-in-a-lifetime moment, and for making this day even more meaningful with your presence, love, and prayers. I will always treasure this night and the memories we create together.
            </p>
          </div>

          <div class="message-debutante-footer">
            <div class="message-debutante-signoff">With love,</div>
            <div class="message-debutante-signature">Mia Kirsten</div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
	
<!-- COUNTDOWN SECTION -->
<section class="date-countdown js-animate js-countdown-reveal">

    <!-- Background Video -->
    <video class="countdown-bg-video" autoplay muted loop playsinline>
        <source src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/video/countdown-bg.mp4" type="video/mp4">
    </video>

    <!-- Top Floral -->
    <div class="countdown-floral top js-countdown-item">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/floral-top.png" alt="Floral Divider Top">
    </div>

    <div class="wedding-date js-countdown-item">The Peninsula Manila<br/>
		23rd December 2026</div>

    <div class="ceremony-reception js-countdown-item">

        <div class="event-block">
            <div class="event-title">THE PROGRAM</div>
            <div class="event-sub">4:00 PM</div>
        </div>

        <hr class="countdown-inner-line">

        <div class="event-block">
            <div class="event-title">DINNER &amp; CELEBRATION</div>
            <div class="event-sub">6:30 PM</div>
        </div>

    </div>

    <div class="countdown js-countdown-item" data-target="2026-12-23T16:00:00">
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
    <div class="countdown-floral bottom js-countdown-item">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/floral-bottom.png" alt="Floral Divider Bottom">
    </div>

</section>

<!-- GALLERY SECTION -->
<section id="gallery" class="gallery-section js-animate">
    <div class="gallery-header">
        <div>
            <div class="section-label">Turning Eighteen</div>
            <h2>Moments Worth Celebrating</h2>
        </div>
    </div>

    <div class="gallery-grid">

<?php for ($i = 1; $i <= 12; $i++) : ?>

    <?php
        // Your REAL folder path:
        $folder = '/assets/img/';
        $filename = 'gallery-' . $i . '.jpg';

        $img = get_template_directory_uri() . $folder . $filename;
        $file_path = get_template_directory() . $folder . $filename;

    ?>

	<div class="gallery-item js-gallery-item"
		 data-full-image="<?php echo esc_url($img); ?>">

        <img class="image-placeholder"
             src="<?php echo esc_url($img); ?>"
             alt="Gallery photo <?php echo (int) $i; ?>"
             loading="eager"
             decoding="auto"
             width="600"
             height="800">

        <div class="hover-overlay"></div>

    </div>

<?php endfor; ?>

    </div>
</section>

<!-- Single Lightbox Section (Part of the Gallery Section) -->
<div class="lightbox-overlay">
    <div class="lightbox-content">
		<span class="lightbox-close">&times;</span> 
        <span class="lightbox-arrow left">&#10094;</span>
        <img class="lightbox-image" src="" alt="">
        <span class="lightbox-arrow right">&#10095;</span>
    </div>
</div>
	
<!-- ENTOURAGE SECTION -->
<section id="entourage">

    <div class="entourage-text-header">
        <div class="entourage-subtitle">With Hearts Beside Her</div>
        <h2 class="entourage-title">Debut Entourage</h2>
    </div>

    <div class="entourage-divider-top"></div>

    <div class="entourage-grid">

    <?php for ($i = 1; $i <= 6; $i++) : 
        $img = get_template_directory_uri() . "/assets/img/entourage-$i.jpg";
    ?>
        <div class="entourage-item js-entourage-item" data-full-image="<?php echo esc_url($img); ?>">
            <img src="<?php echo esc_url($img); ?>" alt="Entourage Photo <?php echo $i; ?>">
        </div>
    <?php endfor; ?>

</div>

    <div class="entourage-divider-bottom"></div>

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
        <h2 class="rsvp-title">I Can't Wait To See You!</h2>
        <p class="rsvp-subtext">Please RSVP before December 15, 2026. I would love to know if you will celebrate with me.</p>

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
                <textarea id="mgw_message" name="mgw_message" placeholder="Your words mean so much to me. I’d love to hear your wishes as I step into this new chapter." maxlength="500"></textarea>
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
                            <span>Reception Details</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="event-accordion-item">
                        <div class="event-accordion-header" data-target="panel-dresscode">
                            <span>Dress Code &amp; Attire</span>
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
			<div class="event-location-title">The Peninsula Manila</div>

			<div class="event-schedule">
				<div class="event-row">
					<span class="event-label">The Program</span>
					<span class="event-separator">•</span>
					<span class="event-hour">4:00 PM</span>
				</div>

				<div class="event-row">
					<span class="event-label">Dinner &amp; Celebration</span>
					<span class="event-separator">•</span>
					<span class="event-hour">6:30 PM</span>
				</div>
			</div>
			
		<div class="event-map-wrapper event-photo-wrapper">
			<img
				src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/venue.jpg"
				alt="The Chandelier Events Place"
				class="event-venue-photo"
			>
		</div>

        <a class="event-map-link"
       href="https://www.google.com/maps/place/The+Peninsula+Manila/@14.5555687,121.0236366,17.46z/data=!4m9!3m8!1s0x3397c908ef6e5a3f:0x900d87edb05dd155!5m2!4m1!1i2!8m2!3d14.5556401!4d121.0251313!16s%2Fm%2F027k9bw?entry=ttu&g_ep=EgoyMDI2MDMxNy4wIKXMDSoASAFQAw%3D%3D"
           target="_blank" rel="noopener">
           Open in Maps →
        </a>
    </div>

</div>
				
<!-- DRESS CODE -->
<div class="event-panel" id="panel-dresscode">

    <div class="dresscode-scroll">

        <!-- ==========================
             WEDDING GUESTS
        =========================== -->
        <div class="dresscode-section-block">

            <div class="wedding-palette-wrapper js-animate-palette">
                <div class="wedding-palette-label">Debutante's Guests</div>

                <div class="palette-caption dresscode-main-caption">
                    Indoor garden party outfits in pastel hues.<br>
                    Linen, cotton, or Barong Tagalog button-downs with formal pants and shoes for the gentlemen.<br>
                    Ankle to floor-length garden party dresses for the ladies.<br>
                    Strictly formal to semi-formal. No flip-flops, tank tops, denim, and shorts.
                </div>

                <div class="wedding-palette">
                    <span class="palette-color d1"></span>
                    <span class="palette-color d2"></span>
                    <span class="palette-color d3"></span>
                    <span class="palette-color d4"></span>
                    <span class="palette-color d5"></span>
                    <span class="palette-color d6"></span>
                    <span class="palette-color d7"></span>
                </div>
            </div>

            <div class="dresscode-row">
                <div class="dresscode-column">
                    <div class="palette-group">
                        <div class="palette-group-title">Ladies</div>
                    </div>
                    <div class="dresscode-photo">
                        <img class="dresscode-img"
                             src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/ladies-guests.png"
                             alt="Ladies Dress Code">
                    </div>
                </div>

                <div class="dresscode-column">
                    <div class="palette-group">
                        <div class="palette-group-title">Gentlemen</div>
                    </div>
                    <div class="dresscode-photo">
                        <img class="dresscode-img"
                             src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gentlemen-guests.png"
                             alt="Gentlemen Dress Code">
                    </div>
                </div>
            </div>

        </div>

        <!-- ==========================
             FAMILY MEMBERS
        =========================== -->
        <div class="dresscode-section-block">

            <div class="wedding-palette-wrapper js-animate-palette">
                <div class="wedding-palette-label">Family Members</div>

                <div class="palette-caption dresscode-main-caption">
                    Strictly formal. No flip-flops, denim, and shorts.<br>
                    Linen, cotton, or Barong Tagalog button-downs with formal pants and shoes for the gentlemen.<br>
                    Ankle to floor-length garden party dresses for the ladies.
                </div>

                <div class="wedding-palette">
                    <span class="palette-color c1"></span>
                    <span class="palette-color c2"></span>
                    <span class="palette-color c3"></span>
                    <span class="palette-color c4"></span>
                    <span class="palette-color c5"></span>
                    <span class="palette-color c6"></span>
                </div>
            </div>

            <div class="dresscode-row">
                <div class="dresscode-column">
                    <div class="palette-group">
                        <div class="palette-group-title">Ladies</div>
                    </div>
                    <div class="dresscode-photo">
                        <img class="dresscode-img"
                             src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/ladies-family.png"
                             alt="Ladies Family Dress Code">
                    </div>
                </div>

                <div class="dresscode-column">
                    <div class="palette-group">
                        <div class="palette-group-title">Gentlemen</div>
                    </div>
                    <div class="dresscode-photo">
                        <img class="dresscode-img"
                             src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/gentlemen-family.png"
                             alt="Gentlemen Family Dress Code">
                    </div>
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

			<!-- EDITORIAL CARD -->
			<div class="gift-card">

				<p class="gift-note-text">
					Gifts are always a joy to receive.
					<br>
					However, any heartfelt contribution toward my savings would be deeply appreciated.
				</p>

			</div>

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