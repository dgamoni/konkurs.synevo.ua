<?php get_header(); ?>

	
		<div id="primary">
			<div id="content">
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	<div id="thumb">
                        	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                         	</div>
                            <div id="mycontent">
							<h2><?php the_date('d.m.Y'); ?>&nbsp;<a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<?php the_content('<div id="moretext">Les hele saken --></div>'); ?>
                            </div>
                            <div id="mynextpost" style="text-align: right; margin-top: 10px;">
                             <?php previous_post_link('читать еще новости от %link &raquo;'); ?>
							 
                              </div>
                            <div class="clearfix"></div>
                        </article>
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>