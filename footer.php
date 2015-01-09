 <div class="clear"></div>
</div>
 <div class="clear"></div>
  <div id="footer">
  	<div id="box">   
        <?php wp_nav_menu( array('container' => false,
                 'theme_location' => 'footer',
                 'menu_id' => 'menu',
                 'menu_class' => 'menu',
                 'walker' => new Custom_Walker_Nav_Menu) ); ?>
                 <div style=" float: right; margin: 40px 0 0 0;">
                 <a href="http://www.facebook.com/BlackMagicShine" target="_blank">
                        <img src="images/facebook.png" border="0" width="23" height="23"></a>
                        <div class="fb-like" data-href="http://www.facebook.com/BlackMagicShine" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true"></div>
                </div>
                <?php dynamic_sidebar('footer-widget'); ?>
     </div><!-- end padding -->
            </div><!-- end footer -->
 <?php  wp_footer(); ?>
 <script type="text/javascript">
    var menu=new menu.dd("menu");
    menu.init("menu","menuhover");
	
	var sub_menu=new sub_menu.dd("sub_menu");
    sub_menu.init("sub_menu","sub_menuhover");
    </script>
 <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3973793-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html> 