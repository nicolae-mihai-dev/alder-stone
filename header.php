<?php
/**
 * The header for the Alder Stone theme.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$alder_stone_is_front_page = is_front_page();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/alder-stone-mark.svg' ); ?>" type="image/svg+xml">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php wp_body_open(); ?>

<div class="site" id="page">

	<header class="site-header<?php echo esc_attr( $alder_stone_is_front_page ? ' site-header--home' : '' ); ?>" id="wrapper-navbar">
		<a class="skip-link visually-hidden-focusable" href="#content">
			<?php esc_html_e( 'Skip to content', 'alder-stone' ); ?>
		</a>

		<nav class="navbar navbar-expand-lg <?php echo esc_attr( $alder_stone_is_front_page ? 'navbar-dark' : 'navbar-light' ); ?> alder-stone-navbar" aria-label="<?php esc_attr_e( 'Primary menu', 'alder-stone' ); ?>">
			<div class="container">
				<a class="navbar-brand alder-stone-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<svg class="alder-stone-brand__mark" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
						<path class="alder-stone-brand__mark-primary" d="M6 39c0-16 12-28 28-28 12 0 22 6 25 17 3 13-5 25-20 28C23 59 6 53 6 39Z" />
						<path class="alder-stone-brand__mark-secondary" d="M16 48C5 35 12 13 30 7c12-4 23 1 27 12-7 1-12 4-16 9-5 7-7 15-7 22-7 2-13 1-18-2Z" />
						<path class="alder-stone-brand__mark-detail" d="M22 49c8-10 13-19 16-31m-7 13 10-4m-7-7 5-7m-10 22-7-5" />
					</svg>
					<span class="alder-stone-brand__wordmark"><?php esc_html_e( 'ALDER & STONE', 'alder-stone' ); ?></span>
				</a>

				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#primary-navigation"
					aria-controls="primary-navigation"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Toggle navigation', 'alder-stone' ); ?>"
				>
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="primary-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container'       => false,
							'menu_class'      => 'navbar-nav ms-auto',
							'menu_id'         => 'primary-menu',
							'depth'           => 2,
							'fallback_cb'     => false,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div>
			</div>
		</nav>
	</header>
