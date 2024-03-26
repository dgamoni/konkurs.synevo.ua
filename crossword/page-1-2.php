<?php get_header(); ?>

<?php include_once("analyticstracking_slavik.php") ?>
<?php include_once("analyticstracking.php") ?>


		<div id="primary">
			
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	
                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<?php the_content('<div id="moretext">Les hele saken --></div>'); ?>
                            
                            
                            <div class="clearfix"></div>
                        </article>
                       
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
			
		</div><!-- #primary -->
        
		<div class="clearfix"></div>
        
<?php get_footer(); ?>