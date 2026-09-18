<?php
/**
 * Reusable card for a Journal post.
 *
 * @package AlderStone
 */

defined( 'ABSPATH' ) || exit;

$post_id      = get_the_ID();
$categories   = get_the_category( $post_id );
$category_name = $categories ? $categories[0]->name : __( 'Journal', 'alder-stone' );
$word_count   = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ) );
$reading_time = max( 1, (int) ceil( $word_count / 220 ) );
$excerpt      = trim( get_post_field( 'post_excerpt', $post_id ) );

if ( ! $excerpt ) {
	$excerpt = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 28, '…' );
}
?>

<article <?php post_class( 'journal-card' ); ?> id="post-<?php the_ID(); ?>">
	<a class="journal-card__link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="journal-card__media">
				<?php the_post_thumbnail( 'large', array( 'class' => 'journal-card__image', 'sizes' => '(min-width: 1200px) 33vw, (min-width: 768px) 50vw, 100vw' ) ); ?>
			</figure>
		<?php else : ?>
			<div class="journal-card__placeholder" aria-hidden="true"><span class="alder-eyebrow"><?php echo esc_html( $category_name ); ?></span></div>
		<?php endif; ?>

		<div class="journal-card__content">
			<p class="journal-card__meta"><span><?php echo esc_html( $category_name ); ?></span><span><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span><span><?php echo esc_html( sprintf( _n( '%d min read', '%d min read', $reading_time, 'alder-stone' ), $reading_time ) ); ?></span></p>
			<h2 class="alder-heading-item journal-card__title"><?php the_title(); ?></h2>
			<?php if ( $excerpt ) : ?><p class="alder-copy journal-card__excerpt"><?php echo esc_html( $excerpt ); ?></p><?php endif; ?>
			<span class="journal-card__read-more"><?php esc_html_e( 'Read article', 'alder-stone' ); ?><span aria-hidden="true"> →</span></span>
		</div>
	</a>
</article>
