<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News_One
 */

get_header();
global $news_one_theme_options;
$blgo_option   = esc_attr( $news_one_theme_options['news_one_blog_layout_options'] );
$breadcrumb_option = absint( $news_one_theme_options['news_one_site_breadcrumb_options'] );

if( $breadcrumb_option == 1)
 {
?>
	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php news_one_breadcrumb_trail()?>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->
<?php } ?>

<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div id="primary"  class="col-lg-8 col-md-12">
              
              	<?php 
               	$i = 0;

              	if ( have_posts() ) : 
                 
              	?>
	          
                <div class="block category-listing <?php if($blgo_option!='one-column'){ ?><?php }?> ">

					<?php
					the_archive_title( '<h3 class="block-title"><span>', '</span></h3' );

					?>
					<ul></ul>		
					<?php
					if( ($blgo_option == 'two-column') )
						{ ?> <div class="row"> <?php } 
							
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						if( ($blgo_option == 'two-column') )
						{ ?>
                       
						 
					     <?php get_template_part( 'template-parts/content', 'twocolumn' ); ?>
					    
						<?php }
						
						elseif( ($blgo_option == 'first-full-image') && ( $i==0 ) )
						{
					
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="post-block-style top-larget-post clearfix">
									<?php
									if( has_post_thumbnail())
									{ 
									?>
										<div class="post-thumb">
											<?php the_post_thumbnail('full'); ?>
										</div>
					             <?php } 
										if( has_post_thumbnail() ):
											$categories = get_the_category();
											if ( ! empty( $categories ) ) {
												echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
											}
										endif;                                
										?>
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
							</div><!-- Col end -->
						</div><!-- Top Big post end -->
						    
							
						<?php } else
						{
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );
                         }
						$i++; endwhile;
						if( ($blgo_option == 'two-column') )
						{ ?> </div> <?php } 
						?>
			    </div><!-- Block Technology end -->
			    
            	<div class="pagination">
					<?php
						do_action('news_one_action_navigation');
						else :
						get_template_part( 'template-parts/content', 'none' );
						endif;
					?>
				</div>
			
			</div><!-- Content Col end -->
			 <?php get_sidebar(); ?>
       
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	<?php
	get_footer();
