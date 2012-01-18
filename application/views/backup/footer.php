	
	<div class="clear"></div>
	
    <footer>
		<div id="footer">
			<div id="footer-menu">
				<ul>
					<li><a href="<?=site_url('about')?>">About</a></li>
					<li><a href="<?=site_url('jobs')?>">Jobs</a></li>
					<li><a href="<?=site_url('press')?>">Press</a></li>
					<li><a href="<?=site_url('help')?>">Help</a></li>
					<li><a href="<?=site_url('terms')?>">Terms</a></li>
					<li><a href="<?=site_url('privacy')?>">Privacy</a></li>
					<li><a href="<?=site_url('submit')?>">Submit a Bizingah!</a></li>
				</ul>
			</div><!-- /footer-menu -->
			
			<div id="footer-copyright">
				&#169; <?=date('Y')?>, Bizingah! Inc. All Rights Reserved.
			</div><!-- /footer-copyright -->
			
			<div class="clear"></div>
		</div><!-- /footer -->
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

	<?/* A js function to grab the base url from PHP */?>
	<script type="text/javascript">
		function getBaseURL() {
		    return "<?=base_url()?>";
		}
	</script>


  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
	 <script src="<?=base_url()?>public/admin/js/jquery/jquery-ui-1.8.12.custom.min.js"></script>
	 <script src="<?=base_url()?>public/admin/js/jquery/facebox.js"></script>

	 <script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'b8773f5b-a1f3-4101-b9ca-a392acf84777'});</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="<?=base_url()?>public/js/plugins.js"></script>
  <script defer src="<?=base_url()?>public/js/script.js"></script>
  <!-- end scripts-->

	
  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


	<?/* Other Scripts loaded by the controller */?>
	<?if(isset($scripts)):?>		
		<?foreach($scripts as $s):?>
			<script type="text/javascript" src="<?=$s?>"></script>
		<?endforeach?>
	<?endif?>
	
	
	
	<script type="text/javascript">
		function getUserId()
		{
			<?if(!$this->tank_auth->is_logged_in()):?>
				return 0;
			<?else:?>
				return "<?=$this->tank_auth->get_user_id()?>".length;
			<?endif?>
		}
		
	</script>

	<script type="text/javascript" src="<?=base_url()?>public/js/jquery.backstretch.min.js"></script>

	  <script type="text/javascript">
	  $.backstretch("<?=base_url()?>public/img/bg.png", {speed: 150});
	</script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

<?if($this->uri->uri_string() != 'help'):?>
<script type="text/javascript" charset="utf-8">
  var is_ssl = ("https:" == document.location.protocol);
  var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
  document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript" charset="utf-8">
  var feedback_widget_options = {};

  feedback_widget_options.display = "overlay";  
  feedback_widget_options.company = "bizingah";
  feedback_widget_options.placement = "left";
  feedback_widget_options.color = "#222";
  feedback_widget_options.style = "idea";
  
  
  
  
  
  
  

  var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
</script>
<?endif?>  
</body>
</html>
