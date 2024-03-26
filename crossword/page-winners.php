<?php get_header(); ?>

		<div id="primary">
			<div id="content_left">
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	
                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <p>&nbsp;</p>
                            <h3 >Планшет Samsung Galaxy Tab</h3>                           
							
                            <?php winners(); ?>
                                                        
                            <div class="clearfix"></div>
                        </article>
                       
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
			</div> <!-- #content_left -->
            
            <?php get_sidebar('winners'); ?>
            
		</div><!-- #primary -->
        
		<div class="clearfix"></div>
        
<?php get_footer(); ?>