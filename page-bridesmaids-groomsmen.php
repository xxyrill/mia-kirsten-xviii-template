<?php
/**
 * Template Name: Bridesmaids & Groomsmen
 */
get_header();
?>

<main>

    <section class="hero-desktop js-animate">
        <div class="hero-media">
            <img
                class="image-placeholder"
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/bridal-party-hero.jpg' ); ?>"
                alt="Bridesmaids and Groomsmen hero"
            >
        </div>
        <div class="hero-overlay">
            <div class="couple-names" style="font-size:40px;">Bridesmaids &amp; Groomsmen</div>
        </div>
    </section>

    <section class="couple-section">
        <div style="text-align:center;margin-bottom:40px;" class="js-animate">
            <div class="small-accent">Together By Our Side</div>
            <h2 style="font-size:30px;letter-spacing:0.22em;text-transform:uppercase;margin-top:10px;">Meet The Amazing Bridesmaids &amp; Groomsmen</h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:30px;margin-bottom:60px;">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php $img = get_template_directory_uri() . '/assets/bridesmaid-' . $i . '.jpg'; ?>
                <div style="text-align:center;" class="js-animate">
                    <div class="couple-photo-placeholder">
                        <img
                            src="<?php echo esc_url( $img ); ?>"
                            alt="Bridesmaid <?php echo (int) $i; ?>"
                        >
                    </div>
                    <div style="margin-top:12px;font-style:italic;color:#c29a5b;">Bridesmaid</div>
                    <div style="text-transform:uppercase;letter-spacing:0.22em;margin-top:4px;">Name Here</div>
                    <div class="couple-social">Fb · Tw · Ig</div>
                </div>
            <?php endfor; ?>
        </div>

        <div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:30px;">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php $img = get_template_directory_uri() . '/assets/groomsmen-' . $i . '.jpg'; ?>
                <div style="text-align:center;" class="js-animate">
                    <div class="couple-photo-placeholder">
                        <img
                            src="<?php echo esc_url( $img ); ?>"
                            alt="Groomsmen <?php echo (int) $i; ?>"
                        >
                    </div>
                    <div style="margin-top:12px;font-style:italic;color:#c29a5b;">Groomsmen</div>
                    <div style="text-transform:uppercase;letter-spacing:0.22em;margin-top:4px;">Name Here</div>
                    <div class="couple-social">Fb · Tw · Ig</div>
                </div>
            <?php endfor; ?>
        </div>
    </section>

</main>

<?php
get_footer();
?>