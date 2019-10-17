<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package News_One
*/
?>
<div class="post-block-style post-list clearfix" id="post-<?php the_ID(); ?>">
	<div class="row">
	<?php if( has_post_thumbnail() ) { ?>
		<div class="col-lg-12 col-md-12">
			<div class="post-thumb thumb-float-style">
				<?php news_one_post_thumbnail(); ?>
				<?php
					if( has_post_thumbnail()):
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
						}
					endif;                                
					?>
			</div>
		</div><!-- Img thumb col end -->
	 <?php } ?>

		<div class=" col-lg-<?php if( has_post_thumbnail() ) {  echo "12"; } else { echo "12"; } ?> col-md-12">
			<div class="post-content">
	 			<h2 class="post-title title-large">
	 				<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
	 			</h2>
	 			<div class="post-meta">
						<span class="post-author"><a href="#"><?php news_one_posted_by();?></a></span>
						<span class="post-date"><?php news_one_posted_on();?></span>
						<span class="post-comment pull-right"><i class="fa fa-comments-o"></i>
						<a href="#" class="comments-link"><span><?php comments_number(); ?></span></a></span>
				</div>
	 			<?php
					the_excerpt();			       
				?>
 			</div><!-- Post content end -->
		</div><!-- Post col end -->
	</div><!-- 1st row end -->
</div><!-- 1st Post list end -->
