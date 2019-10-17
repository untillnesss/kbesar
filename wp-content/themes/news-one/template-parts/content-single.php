<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News_One
 */
?>
<div class="single-post">
	
	<div class="post-title-area">
		<?php
			if( has_post_thumbnail() ):
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
			}                                 
			endif; 
		?>
		<h2 class="post-title">
			<?php the_title(); ?>
		</h2>
		<div class="post-meta">
				<span class="post-author">
					<?php news_one_posted_by();?>
				</span>
				<span class="post-date"><i class="fa fa-clock-o"></i> <?php news_one_posted_on();?></span>
				<span class="post-comment"><i class="fa fa-comments-o"></i>
					<a href="#" class="comments-link"><span><?php comments_number(); ?></span></a></span>
			</div>
		</div><!-- Post title end -->

		<div class="post-content-area">
			<div class="post-media post-featured-image <?php echo $image_layout; ?> ">
				<?php news_one_post_thumbnail(); ?>
			</div>
			<div class="entry-content">
				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'news-one' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-one' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- Entery content end -->

				<div class="tags-area clearfix subCategory unstyled">
					<div class="post-tags">
						<li><?php the_tags();?></li>
					</div>
				</div><!-- Tags end -->
		</div><!-- post-content end -->
	</div><!-- Single post end -->
