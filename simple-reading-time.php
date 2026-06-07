<?php
/**
 * Plugin Name: Simple Reading Time
 * Plugin URI: https://wp.nrwone.in
 * Description: Display estimated reading time on posts with customizable reading speed and display position.
 * Version: 1.0.0
 * Author: NRW India
 * Author URI: https://nrwone.in
 * License: GPLv2 or later
 * Text Domain: simple-reading-time
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add settings page
 */
add_action('admin_menu', 'srt_add_admin_menu');

function srt_add_admin_menu() {
    add_options_page(
        'Simple Reading Time',
        'Reading Time',
        'manage_options',
        'simple-reading-time',
        'srt_settings_page'
    );
}

/**
 * Register settings
 */
add_action('admin_init', 'srt_register_settings');

function srt_register_settings() {
    register_setting('srt_settings_group', 'srt_wpm');
    register_setting('srt_settings_group', 'srt_position');
}

/**
 * Settings Page
 */
function srt_settings_page() {
?>
<div class="wrap">
    <h1>Simple Reading Time</h1>

    <form method="post" action="options.php">
        <?php settings_fields('srt_settings_group'); ?>

        <table class="form-table">
            <tr>
                <th>Words Per Minute</th>
                <td>
                    <input type="number"
                           name="srt_wpm"
                           value="<?php echo esc_attr(get_option('srt_wpm', 200)); ?>"
                           min="50"
                           max="1000">
                </td>
            </tr>

            <tr>
                <th>Display Position</th>
                <td>
                    <select name="srt_position">
                        <option value="before" <?php selected(get_option('srt_position'),'before'); ?>>
                            Before Content
                        </option>
                        <option value="after" <?php selected(get_option('srt_position'),'after'); ?>>
                            After Content
                        </option>
                    </select>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
<?php
}

/**
 * Calculate Reading Time
 */
function srt_calculate_reading_time($content) {

    $word_count = str_word_count(strip_tags($content));
    $wpm = get_option('srt_wpm', 200);

    $minutes = ceil($word_count / $wpm);

    return '<div class="srt-reading-time" style="margin-bottom:15px;font-weight:600;">
        📖 ' . $minutes . ' min read
    </div>';
}

/**
 * Show Reading Time
 */
add_filter('the_content', 'srt_display_reading_time');

function srt_display_reading_time($content) {

    if (!is_single() || !in_the_loop() || !is_main_query()) {
        return $content;
    }

    $reading_time = srt_calculate_reading_time($content);
    $position = get_option('srt_position', 'before');

    if ($position === 'after') {
        return $content . $reading_time;
    }

    return $reading_time . $content;
}
