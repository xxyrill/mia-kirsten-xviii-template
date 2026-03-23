<?php
/**
 * Header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
<!-- Open Graph Meta Tags -->
<meta property="og:image" content="https://mia-kirsten-xviii.dongprints.com/wp-content/themes/mia-kirsten-xviii-template/assets/img/gallery-3.jpg">
<meta property="og:image:secure_url" content="https://mia-kirsten-xviii.dongprints.com/wp-content/themes/mia-kirsten-xviii-template/assets/img/gallery-3.jpg">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1080">
<meta property="og:image:height" content="1350">

<meta property="og:site_name" content="Dong Web">	
	
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<!-- SCRIPT TO PREVENT GOING BACK TO THE OPENING SCREEN AFTER SENDING RSVP -->
	<script>
(function () {
    if (sessionStorage.getItem("invitationOpened") === "yes") {
        document.documentElement.classList.add("skip-opening");
    }
})();
</script>
	

<div class="site-wrapper">
<header class="site-header" id="siteHeader">

<nav class="main-nav">

    <div class="nav-inner">

        <!-- Desktop menus (unchanged) -->
        <ul class="nav-left desktop-only">
            <li><a href="#top" class="nav-home">Home</a></li>
            <li><a href="#message-debutante">Message</a></li>
            <li><a href="#gallery">Gallery</a></li>
        </ul>
		
    <div class="nav-couple-name desktop-only">
        <span>MIA KIRSTEN</span>
    </div>

        <ul class="nav-right desktop-only">
            <li><a href="#entourage">Entourage</a></li>
            <li><a href="#eventinformation">Event Info</a></li>
            <li><a href="#rsvp" class="rsvp-button">RSVP</a></li>
        </ul>

    </div> <!-- END nav-inner -->


		<!-- ✅ MOBILE HEADER (Updated with couple names centered) -->
<div class="mobile-header mobile-only">
    <div class="mobile-header-inner">

        <!-- LEFT: Couple Names -->
        <div class="mobile-couple-name">
            <span>MIA</span><br>
            <span>KIRSTEN</span>
        </div>

        <!-- RIGHT: RSVP + Hamburger -->
<div class="mobile-right-group">
    <a href="#rsvp" class="mobile-rsvp-gold">RSVP</a>

    <div class="menu-icon-dotmenu" id="mobileToggle">
        <div class="lines">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="dot"></div>
    </div>
</div>

    </div>
</div>

    <!-- MOBILE OVERLAY -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

    <!-- MOBILE MENU -->
    <div class="mobile-menu new-mobile-menu" id="mobileMenu">

		<div class="mobile-profile-header"
     style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/panel-mobile.jpg');">
</div>

        <div class="mobile-menu-list">
			<a href="#rsvp" class="mobile-item rsvp-link">RSVP</a>
            <a href="#top" class="mobile-item">Home</a>
            <a href="#message-debutante" class="mobile-item">Message</a>
            <a href="#entourage" class="mobile-item">Entourage</a>
            <a href="#gallery" class="mobile-item">Gallery</a>
            <a href="#eventinformation" class="mobile-item">Event Information</a>
        </div>

    </div>

</nav>
</header>