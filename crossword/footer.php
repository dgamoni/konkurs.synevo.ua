	
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

<!-- new ---------------------------------- -->

<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.18;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='8' height='8'><\/a>")
//--></script><!--/LiveInternet-->


<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=21056653&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/21056653/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:21056653,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21056653 = new Ya.Metrika({id:21056653,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21056653" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40329311-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- ------------------ new end -------------- -->


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