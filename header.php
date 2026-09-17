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
	<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/favicon-32.png' ); ?>" sizes="32x32" type="image/png">
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/apple-touch-icon.png' ); ?>" sizes="180x180">
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
				<?php get_template_part( 'template-parts/brand', null, array( 'classes' => 'navbar-brand', 'variant' => $alder_stone_is_front_page ? 'light' : 'dark' ) ); ?>

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
