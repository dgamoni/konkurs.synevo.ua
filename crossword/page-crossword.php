<?php get_header(); ?>

		<div id="primary">
			<div id="content_left">
				<div class="wrap">
                	<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<article>
                        	
                            <h2><?php echo get_the_title(65); ?></a></h2>
                                                        
							<?php
							
							// id for permalink crossword-1 
							 if (get_field('crossword', 'option')==1)
							{
							$side = 1;	
							//echo 'кроссворд 1';
							$the_slug = 'crossword-1';
							$args=array('name' => $the_slug,'post_type' => 'page');
							$my_posts = get_posts($args);
							$my_id=($my_posts[0]->ID);
							}
							// id for permalink crossword-2
							 elseif (get_field('crossword', 'option')==2)
							{
							$side = 2;
							//echo 'кроссворд 2';
							$the_slug = 'crossword-2';
							$args=array('name' => $the_slug,'post_type' => 'page');
							$my_posts = get_posts($args);
							$my_id=($my_posts[0]->ID);
							}
							// id for permalink crossword-3
							elseif (get_field('crossword', 'option')==3)
							{
							$side = 3;
							//echo 'кроссворд 3';
							$the_slug = 'crossword-3';
							$args=array('name' => $the_slug,'post_type' => 'page');
							$my_posts = get_posts($args);
							$my_id=($my_posts[0]->ID);
							}
							
							// out custom content for id crossword
							$post_id = get_post($my_id);
							$content = $post_id->post_content;
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]>', $content);
							echo $content;
							?>
                                                        
                            <div class="clearfix"></div>
                        </article>
                       
					<?php endwhile; ?>
					<?php else: ?> <p>Ничего не найдено</p>
					<?php endif; ?>
				</div><!-- #wrap -->
			</div> <!-- #content_left -->
            
            <?php
				   if ($side ==1) {
				get_sidebar('right');
			} else if ($side ==2) {
				get_sidebar('right2');
			} else if ($side ==3) {
				get_sidebar('right3');
			}		
				
				
			  ?>
            
		</div><!-- #primary -->
        
		<div class="clearfix"></div>
        
<?php get_footer(); ?>