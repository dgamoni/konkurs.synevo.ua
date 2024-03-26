	
	<footer>
    
    	<div id="footer_logo">
        <a href="/"><img src="<?php bloginfo('template_url'); ?>/img/footer_logo.png" alt="Борьба Умов"></a>	
		</div>
        
        <div id="footer_inf">
        <?php if ( ! dynamic_sidebar( 'footer_inf' ) ) : ?>
		<?php endif; // end  widget area ?>
        	
		</div>
        
        <div id="footer_tel">
        <?php if ( ! dynamic_sidebar( 'footer_tel' ) ) : ?>
		<?php endif; // end  widget area ?>
        	
		</div>
        
        
        <div class="clearfix"></div>
        
        
	</footer><!--footer -->
    
    
  </div><!-- #main -->
</div><!-- #page -->

<!--<script src="<?php echo get_template_directory_uri(); ?>/js/myjquery.js"></script>-->

<?php wp_footer(); ?>
</body>
</html>