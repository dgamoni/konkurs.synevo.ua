	
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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7956456-16']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--  facebook invite----------------------------->
<?php
if ( is_user_logged_in() ) {
wp_get_current_user();
global $current_user;
$val = $current_user->user_login;
} else { $val = '';}
//return $pageURL.'/registration?ref='.$val;
?>
    
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <div id="fb-root"></div>
    <script>
	jQuery(document).ready(function($){
		
	$(".my-explicit-button").click(function () {
   

      // assume we are already logged in
      FB.init({appId: '566988619990967', xfbml: true, cookie: true});

      FB.ui({
          method: 'send',
          name: 'Приглашаю Вас принять участие в конкурсе от лаборатории Синэво «Игры разума»',
          link: 'http://konkurs.synevo.ua/registration<?php echo '?ref='.$val ?>',
		  description: 'На сайте конкурса вашему вниманию представлен кроссворд. Все слова в нем связаны с медициной. Достаточно правильно разгадать кроссворд – и Вы можете стать обладателем современного мобильного телефона Samsung Galaxy. А пять самых активных участников получат компьютерные планшеты Samsung Galaxy Tab!',
		  picture : 'http://konkurs.synevo.ua/wp-content/themes/crossword/img/logo_facebook_1.jpg',
		  //display: 'popup',
          });
		  
		  });
		  
		  }) //end document.ready
     </script>
  </body>
</html>
<!--  facebook invite-------------------------->

<?php wp_footer(); ?>
</body>
</html>