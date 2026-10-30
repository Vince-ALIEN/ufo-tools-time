<?php
/**
 * Plugin Name:       Ufo Tools Time
 * Description:       Bloc Gutenberg UFO Time : élément <time> stylisé avec point décoratif et séparateur (Tailwind CSS).
 * Requires at least: 6.6
 * Requires PHP:      7.4
 * Version:           1.0.1
 * Author:            UFO Agency
 * Author URI:        https://ufo-agency.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ufo-tools-time
 * Update URI:        https://github.com/Vince-ALIEN/ufo-tools-time
 *
 * @package UfoToolsTime
 */

if (!defined("ABSPATH")) {
    exit();
}

require_once plugin_dir_path(__FILE__) . 'includes/class-ufo-tools-time-updater.php';

// Mises à jour depuis les releases GitHub (hors is_admin() : la
// vérification des mises à jour tourne aussi en cron).
add_action('plugins_loaded', function () {
    $updater = new Ufo_Tools_Time_Updater(plugin_basename(__FILE__), plugin_dir_path(__FILE__));
    $updater->register_hooks();
});

// Le bloc garde son nom historique (ufo-blocks/ufo-time) pour que les contenus
// existants restent valides. Ufo Blocks ≤ 1.8.0 l'enregistre encore : priorité
// 20 pour passer après lui et ne pas l'enregistrer deux fois.
function ufo_tools_time_block_init()
{
    if (WP_Block_Type_Registry::get_instance()->is_registered("ufo-blocks/ufo-time")) {
        return;
    }
    register_block_type(__DIR__ . "/build/ufo-time");
}
add_action("init", "ufo_tools_time_block_init", 20);

// Catégorie partagée avec Ufo Blocks et les autres Ufo Tools : ajoutée
// seulement si aucun d'eux ne l'a déjà fait.
function ufo_tools_time_register_category($categories) {
    if (in_array('ufo-blocks', wp_list_pluck($categories, 'slug'), true)) {
        return $categories;
    }

    $categories[] = array(
        'slug'  => 'ufo-blocks',
        'title' => __('UFO Blocks', 'ufo-tools-time'),
    );
    return $categories;
}
add_filter('block_categories_all', 'ufo_tools_time_register_category', 20);
