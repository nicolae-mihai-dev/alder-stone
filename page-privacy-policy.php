<?php
/**
 * The template for displaying the Privacy Policy page.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main privacy-page" id="content" tabindex="-1">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php
		$privacy_content = apply_filters( 'the_content', get_the_content() );
		$privacy_toc     = '';

		if ( class_exists( 'DOMDocument' ) ) {
			$previous_libxml_state = libxml_use_internal_errors( true );
			$document              = new DOMDocument();
			$document->loadHTML( '<?xml encoding="utf-8" ?><div id="privacy-content-root">' . $privacy_content . '</div>' );
			$xpath = new DOMXPath( $document );
			$root  = $xpath->query( '//*[@id="privacy-content-root"]' )->item( 0 );

			if ( $root ) {
				$toc_heading = null;

				foreach ( $xpath->query( './/h2|.//h3', $root ) as $heading ) {
					if ( 'table of contents' === strtolower( trim( $heading->textContent ) ) ) {
						$toc_heading = $heading;
						break;
					}
				}

				if ( $toc_heading ) {
					$toc_navigation = $toc_heading->nextSibling;

					while ( $toc_navigation && XML_TEXT_NODE === $toc_navigation->nodeType ) {
						$toc_navigation = $toc_navigation->nextSibling;
					}

					if ( $toc_navigation && 'nav' === strtolower( $toc_navigation->nodeName ) ) {
						foreach ( $xpath->query( './/a[starts-with(@href, "#")]', $toc_navigation ) as $toc_link ) {
							$link_text = trim( $toc_link->textContent );
							$link_id   = ltrim( $toc_link->getAttribute( 'href' ), '#' );

							foreach ( $xpath->query( './/h2|.//h3', $root ) as $content_heading ) {
								if ( $link_text === trim( $content_heading->textContent ) && ! $content_heading->hasAttribute( 'id' ) ) {
									$content_heading->setAttribute( 'id', sanitize_title( $link_id ) );
									break;
								}
							}
						}

						$privacy_toc = $document->saveHTML( $toc_heading ) . $document->saveHTML( $toc_navigation );
						$toc_heading->parentNode->removeChild( $toc_heading );
						$toc_navigation->parentNode->removeChild( $toc_navigation );
					}
				}

				$privacy_content = '';

				foreach ( $root->childNodes as $node ) {
					$privacy_content .= $document->saveHTML( $node );
				}
			}

			libxml_clear_errors();
			libxml_use_internal_errors( $previous_libxml_state );
		}
		?>
		<section class="privacy-hero">
			<div class="container">
				<p class="alder-eyebrow privacy-hero__eyebrow"><?php esc_html_e( 'Legal & Privacy', 'alder-stone' ); ?></p>
				<h1 class="alder-heading privacy-hero__title"><?php the_title(); ?></h1>
			</div>
		</section>

		<section class="privacy-content">
			<div class="container privacy-content__layout<?php echo $privacy_toc ? ' privacy-content__layout--with-toc' : ''; ?>">
				<article <?php post_class( 'privacy-content__article entry-content' ); ?> id="post-<?php the_ID(); ?>">
					<?php echo wp_kses_post( $privacy_content ); ?>
				</article>

				<?php if ( $privacy_toc ) : ?>
					<aside class="privacy-content__toc" aria-label="<?php esc_attr_e( 'Table of contents', 'alder-stone' ); ?>">
						<?php echo wp_kses_post( $privacy_toc ); ?>
					</aside>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
