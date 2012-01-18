</div> <!-- #content -->
	<a href="#facebox_content" rel="facebox" class="btn btn-small btn-orange" id="modal" style="display:none"></a>
	<div id="facebox_content" style="display: none"><p></p></div>
	<div id="footer">		
		<div class="content_pad">			
			<p>&copy; <?=date('Y')?> Copyright <a href="http://bizingah.com">Bizingah!</a>. Powered by <a href="http://infinitech-studios.com">Infinitech Studios Inc.</a>.</p>
		</div> <!-- .content_pad -->
	</div> <!-- #footer -->		
	
</div> <!-- #wrapper -->

<script type="text/javascript" charset="utf-8">
	function getBaseURL()
	{
		return "<?=base_url()?>";
	}
</script>

<script src="<?=base_url()?>public/admin/js/jquery/jquery-1.5.2.min.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery-ui-1.8.12.custom.min.js"></script>
<script src="<?=base_url()?>public/admin/js/misc/excanvas.min.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/facebox.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery.visualize.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery.tablesorter.min.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery.uniform.min.js"></script>
<script src="<?=base_url()?>public/admin/js/jquery/jquery.placeholder.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.cookie.js"></script>
<?/*<script src="<?=base_url()?>public/admin/js/nicEdit.js"></script>*/?>
<script src="<?=base_url()?>public/admin/js/ckeditor.js"></script>
<?/*<script src="<?=base_url()?>public/admin/js/ckfinder/ckfinder.js"></script>*/?>
<script src="<?=base_url()?>public/admin/js/sample.js"></script>

<script src="<?=base_url()?>public/admin/js/jquery.notifyBar.js"></script>
<script src="<?=base_url()?>public/admin/js/widgets.js"></script>
<script src="<?=base_url()?>public/admin/js/dashboard.js"></script>

<script type="text/javascript">
	
$(document).ready(function(){
	
	if($('#description').length)
	{
		var editor = CKEDITOR.replace('description',
	    {
	        /* : '<?=site_url("media/browse")?>',
	        filebrowserUploadUrl : '<?=site_url("media/upload")?>',
	        filebrowserImageWindowWidth : '640',
	        filebrowserImageWindowHeight : '480'*/

	        filebrowserBrowseUrl :'<?=base_url()?>public/admin/js/filemanager/browser/default/browser.html?Connector=<?=base_url()?>public/admin/js/filemanager/connectors/php/connector.php',
			filebrowserImageBrowseUrl : '<?=base_url()?>public/admin/js/filemanager/browser/default/browser.html?Type=Image&Connector=<?=base_url()?>public/admin/js/filemanager/connectors/php/connector.php',
			filebrowserFlashBrowseUrl :'<?=base_url()?>public/admin/js/filemanager/browser/default/browser.html?Type=Flash&Connector=<?=base_url()?>public/admin/js/filemanager/connectors/php/connector.php',
			filebrowserUploadUrl  :'<?=base_url()?>public/admin/js/filemanager/connectors/php/upload.php?Type=File',
			filebrowserImageUploadUrl : '<?=base_url()?>public/admin/js/filemanager/connectors/php/upload.php?Type=Image',
			filebrowserFlashUploadUrl : '<?=base_url()?>public/admin/js/filemanager/connectors/php/upload.php?Type=Flash'
	    });
	}
	
	Dashboard.init();

	$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });

	var $successDiv = $('div.success');
	if($successDiv.length)
		$.notifyBar({ cls: "success", html: $successDiv.html(), close: true, delay: 1000000 });
		
	var $errorDiv = $('div.errors');	
	if($errorDiv.length)
		$.notifyBar({ cls: "error", html: $errorDiv.html(), close: true, delay: 1000000 });


	<?/*editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );

	// Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
	// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
	CKFinder.setupCKEditor( editor, '<?=base_url()?>public/admin/js/ckfinder/' ) ;*/?>
});

</script>

<?/* Other Scripts loaded by the controller */?>
<?if(isset($scripts)):?>		
	<?foreach($scripts as $s):?>
		<script type="text/javascript" src="<?=$s?>"></script>
	<?endforeach?>
<?endif?>

</body> 
 
</html>