<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News_One
 */

?>
<article id="post-<?php the_ID(); ?>">
	<ul class="subCategory unstyled">
		<li><?php the_tags();?></li>
	</ul>

	<div class="row">
		<div class="col-md-12">
			<div class="post-block-style post-grid clearfix">
				<div class="post-thumb">
					<?php news_one_post_thumbnail(); ?>
				</div>
				<?php
           			$categories = get_the_category();
                      if ( ! empty( $categories ) ) {
                      	echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                    }                                 
				?>
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
			</div><!-- Post Block style end -->
		</div><!-- Col 1 end -->
	</div><!-- Row end -->
</article><!-- article end -->