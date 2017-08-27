<?php
/**
 * Header-1 template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="fusion-header-sticky-height"></div>
<div class="fusion-header">
	<div class="fusion-row">
		<?php avada_logo(); ?>
		<div class="social-header"><?php echo do_shortcode('[socials position="header"]'); ?></div>
		<?php avada_main_menu(); ?>
	</div>
</div>
