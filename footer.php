<footer class="site-footer">
  <div class="footer-inner js-footer-reveal">

    <div class="footer-topline js-footer-item"></div>

    <div class="footer-brand-block js-footer-item">
      <div class="footer-kicker">A Night to Remember</div>
      <div class="footer-title">Mia Kirsten</div>
      <div class="footer-subtitle">XVIII</div>
    </div>

    <nav class="footer-menu js-footer-item" aria-label="Footer Navigation">
      <a href="#top" class="nav-home">Home</a>
      <a href="#message-debutante">Message</a>
      <a href="#gallery">Gallery</a>
      <a href="#entourage">Entourage</a>
      <a href="#rsvp">RSVP</a>
    </nav>

    <div class="footer-bottom js-footer-item">
      <span class="footer-copy">Copyright © 2026 Dong Web. All Rights Reserved.</span>
    </div>

  </div>
</footer>
</div><!-- .site-wrapper -->

<!-- Music Player -->
<div id="music-toggle" class="music-toggle" data-tooltip="Music Off">
    <svg viewBox="0 0 50 50" class="music-icon">
        <path d="M35 4v30.5a7.5 7.5 0 1 1-2 -5.5V18h-12v16.5a7.5 7.5 0 1 1-2 -5.5V10l16 -6z"
              stroke="#c6a76a" stroke-width="2.2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</div>

<audio id="wedding-audio" preload="auto" loop>
    <source src="<?php echo get_template_directory_uri(); ?>/assets/audio/wedding-music.mp3" type="audio/mp3">
</audio>

<?php wp_footer(); ?>

<!-- RSVP Loader Section -->
<div id="rsvp-loader">
    <div class="loader-inner">
        <div class="loader-circle"></div>
        <div class="loader-text">Sending RSVP...</div>
    </div>
</div>

</body>
</html>