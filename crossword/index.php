<?php get_header(); ?>

	<div id="slider"> <!-- big slider -->

    </div> <!-- end slider -->
    
    
        <!--news--------------------- -->
        
		<div id="primary">
			<div id="content">
            <div id="news_title"><h2 class="client">Новости</h2></div>
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	<div id="mycontent_news">
							<?php the_date('d.m.Y'); ?>&nbsp;<?php the_title();?>/&nbsp;<?php the_excerpt(); ?>
                             
                            </div>
                            <div class="clearfix"></div>
                        </article>
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
			</div><!-- #content -->
		</div><!-- #primary -->
        <!--end news----------------- -->
         
<?php get_sidebar(); ?>
<?php get_footer(); ?>