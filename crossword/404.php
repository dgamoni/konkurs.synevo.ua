<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="primary">
			<div id="content-right">
				<div class="wrap">

			<article id="post-0" class="post error404 not-found" style="margin-top: 50px; color: #EE1C24;">
            
            
				<header class="entry-header">
					<h1 ><?php _e( 'К сожалению, запрошенная страница не найдена', 'twentyeleven' ); ?></h1>
				</header>

				<div id="mycontent">
					<p><?php _e( 'Возможные причины - неправильно введенный адресс или устаревшие страницы сайта.<br> Выберете в меню нужный вам раздел сайта', 'twentyeleven' ); ?></p>

					

					

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

				</div><!-- #wrap -->
			</div><!-- #content -->
		</div><!-- #primary -->
		<div class="clearfix"></div>

<?php get_footer(); ?>