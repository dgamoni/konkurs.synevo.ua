<?php get_header(); ?>

		<div id="primary">
			
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	
                            <h2><a href="<?php the_permalink();?>">Рейтинг участников с рефералами</a></h2>
							
                            
                            <?php crossword_rating(); ?>
                            
                            
                          


                            
                            <div class="clearfix"></div>
                        </article>
                       
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
		
        	
		</div><!-- #primary -->
        
		<div class="clearfix"></div>
        
<?php get_footer(); ?>