<?php
/**
 * Theme functions
 */

function mgw_enqueue_assets() {
    $theme_uri  = get_stylesheet_directory_uri();
    $theme_path = get_stylesheet_directory();

    // Google Fonts
    wp_enqueue_style(
        'mgw-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Montserrat:wght@300;400;500;600&display=swap',
        array(),
        null
    );

    // === STYLE.CSS ===
    $style_file = $theme_path . '/style.css';
    wp_enqueue_style(
        'mgw-style',
        $theme_uri . '/style.css',
        array('mgw-google-fonts'),
        file_exists($style_file) ? filemtime($style_file) : false
    );

    // === SCRIPTS.JS ===
    $script_file = $theme_path . '/assets/js/scripts.js';
    wp_enqueue_script(
        'mgw-scripts',
        $theme_uri . '/assets/js/scripts.js',
        array('jquery'),
        file_exists($script_file) ? filemtime($script_file) : false,
        true
    );

    wp_localize_script('mgw-scripts', 'mgwData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'mgw_enqueue_assets');


function mgw_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menu('primary', __('Primary Menu', 'oscarjuliennewedding'));
}
add_action('after_setup_theme', 'mgw_theme_setup');

/**
 * RSVP handler
 */
function mgw_handle_rsvp() {

		// Honeypot check
		if (!empty($_POST['mgw_hp'])) {
			// Silently discard spam
			wp_safe_redirect(home_url('/'));
			exit;
		}

		$nonce_valid = (
			isset($_POST['mgw_rsvp_nonce']) &&
			wp_verify_nonce(sanitize_text_field($_POST['mgw_rsvp_nonce']), 'mgw_rsvp_submit')
		);

		// If nonce fails, continue but mark as unverified
		if (!$nonce_valid) {
			// Optional: log for debugging
			error_log('RSVP nonce failed, allowing submission');
		}

    // Collect fields correctly
    $name    = sanitize_text_field($_POST['mgw_name'] ?? '');
    $email   = sanitize_email($_POST['mgw_email'] ?? '');
    $guests  = sanitize_text_field($_POST['mgw_guests'] ?? '');
    $confirm = sanitize_text_field($_POST['mgw_confirmation'] ?? '');
    $message = wp_kses_post($_POST['mgw_message'] ?? '');

    $couple_email = "xyrillmtoong@gmail.com"; // your receiving email

    $subject = 'New RSVP – Mia Kirsten XVIII';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    // Start email output
    ob_start();
    ?>
<div style="width:100%; background:#1E1A15; padding:0; margin:0; text-align:center;">

    <!-- GOLD HEADER -->
    <div style="
        width:100%;
        background:#D9B777;
        color:#1E1A15;
        font-family: 'Cormorant Garamond', serif;
        letter-spacing:3px;
        font-size:14px;
        padding:14px 0;
        text-transform:uppercase;
        text-align:center;
    ">
        MIA KIRSTEN · XVIII
    </div>

    <!-- CONTENT WRAPPER -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" 
           style="max-width:480px; margin:30px auto; background:#000000; padding:30px; border-radius:0;">

        <!-- TITLE -->
        <tr>
            <td style="
                color:#ffffff;
                font-family:'Cormorant Garamond', serif;
                font-size:32px;
                letter-spacing:4px;
                text-transform:uppercase;
                text-align:center;
                padding-bottom:20px;
            ">
                NEW RSVP
            </td>
        </tr>

        <!-- DETAILS -->
<tr>
    <td style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px; text-align:left;">

        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse; margin-top:10px;">

            <?php if (!empty($name)) : ?>
            <tr>
                <td style="padding:10px 0; border-bottom:1px solid #333;">
                    <span style="font-weight:bold;">Name</span><br>
                    <span><?php echo esc_html($name); ?></span>
                </td>
            </tr>
            <?php endif; ?>

            <?php if (!empty($email)) : ?>
            <tr>
                <td style="padding:10px 0; border-bottom:1px solid #333;">
                    <span style="font-weight:bold;">Email</span><br>
                    <span><?php echo esc_html($email); ?></span>
                </td>
            </tr>
            <?php endif; ?>

            <?php if (!empty($guests)) : ?>
            <tr>
                <td style="padding:10px 0; border-bottom:1px solid #333;">
                    <span style="font-weight:bold;">Guests</span><br>
                    <span><?php echo esc_html($guests); ?></span>
                </td>
            </tr>
            <?php endif; ?>

            <?php if (!empty($confirm)) : ?>
            <tr>
                <td style="padding:10px 0; border-bottom:1px solid #333;">
                    <span style="font-weight:bold;">Confirmation</span><br>
                    <span><?php echo esc_html($confirm); ?></span>
                </td>
            </tr>
            <?php endif; ?>

            <?php if (!empty($message)) : ?>
            <tr>
                <td style="padding:10px 0;">
                    <span style="font-weight:bold;">Message</span><br>
                    <span><?php echo nl2br(esc_html($message)); ?></span>
                </td>
            </tr>
            <?php endif; ?>

        </table>

    </td>
</tr>
    </table>
</div>
    <?php
// Finish email output
// Finish email output
$body = ob_get_clean();

// SAVE MESSAGE INTO DATABASE
global $wpdb;
$table = $wpdb->prefix . 'mgw_rsvp';

// Prevent duplicate messages (same name + same message as last submission)
if (!empty($message)) {
    $last = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT message FROM {$wpdb->prefix}mgw_rsvp 
             WHERE name = %s 
             ORDER BY id DESC 
             LIMIT 1",
            $name
        )
    );

    if ($last && trim($last->message) === trim($message)) {
        $skip_insert = true; // duplicate
    } else {
        $skip_insert = false; // new message
    }
} else {
    $skip_insert = false; // empty message = do not save
}

// INSERT message only ONCE
if (!$skip_insert) {
    $wpdb->insert(
        $table,
        [
            'name'         => $name,
            'email'        => $email,
            'guests'       => $guests,
            'confirmation' => $confirm,
            'message'      => $message,
            'created_at'   => current_time('mysql')
        ],
        ['%s','%s','%s','%s','%s','%s']
    );
}

// Send email
wp_mail($couple_email, $subject, $body, $headers);

// Redirect back with success
$redirect = wp_get_referer() ? wp_get_referer() : home_url('/');
$redirect = add_query_arg('rsvp', 'success', $redirect) . '#rsvp';
wp_safe_redirect($redirect);
exit;
	
}
add_action('admin_post_mgw_rsvp', 'mgw_handle_rsvp');
add_action('admin_post_nopriv_mgw_rsvp', 'mgw_handle_rsvp');


/* ============================
   FETCH RSVP MESSAGES (AJAX)
============================ */

add_action('wp_ajax_mgw_get_messages', 'mgw_get_messages');
add_action('wp_ajax_nopriv_mgw_get_messages', 'mgw_get_messages');

function mgw_get_messages() {
    global $wpdb;

    $table = $wpdb->prefix . 'mgw_rsvp';

    // Fetch latest 50 messages
    $rows = $wpdb->get_results("
        SELECT id, name, message, created_at
        FROM $table
        WHERE message IS NOT NULL AND message != ''
        ORDER BY id DESC
        LIMIT 50
    ");

    $items = [];

    foreach ($rows as $r) {
        $items[] = [
            'id'        => intval($r->id),
            'name'      => $r->name,
            'message'   => $r->message,
            'timestamp' => strtotime($r->created_at)
        ];
    }

    wp_send_json([
        'success' => true,
        'data'    => [ 'items' => $items ]
    ]);
}