<?php
/**
 * Désinstallation : seul le cache de la dernière release est propre au
 * plugin. Les blocs déjà enregistrés dans les contenus restent en place.
 *
 * @package UfoToolsTime
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_site_transient( 'ufo_tools_time_github_release' );
