<div class="footer-main">
		<div class="container">
			<div class="row">
				<?php
	                $count = 0;
	                for ($i = 1; $i <= 4; $i++) {
	                    if (is_active_sidebar('footer-bottom-' . $i)) {
	                        $count++;
	                    }
	                }
	                $column = $count;
	                 $column = 4;
			             if( $count == 4 ) 
			             {
			                 $column = 3;  
			              
			             }
			             elseif( $count == 3)
			             {
			                   $column = 4;
			             }
			             elseif( $count == 2) 
			             {
			                   $column = 6;
			             }
			             else{
			             	$column = 12;
			             }
	                for ($i = 1; $i <= 4; $i++) {
	                    if (is_active_sidebar('footer-bottom-' . $i)) {
	                        ?>
	                        <div class="col-lg-<?php echo esc_attr($column); ?> col-sm-12 footer-widget">
	                            <div class="footer-info-content">
	                             <?php dynamic_sidebar('footer-bottom-' . $i); ?>
	                            </div>
	                        </div>
	                    <?php
	                    }
	                }
	                ?>
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Footer main end -->
