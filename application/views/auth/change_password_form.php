<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>EVES<?=isset($title)?' &raquo; '.$title:''?></title>

<link href="<?=base_url()?>public/css/main.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />

<script src="<?=base_url()?>public/js/jquery-1.4.4.js" type="text/javascript"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/spinner/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/spinner/ui.spinner.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<script type="text/javascript" src="<?=base_url()?>public/js/fileManager/elfinder.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/wysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/wysiwyg/wysiwyg.table.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/flot/excanvas.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/flot/jquery.flot.resize.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/dataTables/colResizable.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/forms/forms.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/autotab.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/forms/jquery.filestyle.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/colorPicker/colorpicker.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/uploader/plupload.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/ui/progress.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/ui/jquery.alerts.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/jBreadCrumb.1.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/cal.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.smartWizard.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.ToTop.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.listnav.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.sourcerer.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>public/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>public/js/custom.js"></script>

</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"><a href="<?=site_url('profile')?>" title=""><img src="<?=base_url()?>public/images/userPic.png" alt="" /></a><span>Welcome <?=$this->tank_auth->get_username()?>!</span></div>
            <div class="userNav">
                
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Header -->
<div id="header" class="wrapper">
    <div class="logo"><a href="<?=base_url()?>" title=""><img src="<?= site_url('public/images/loginLogo.png')?>" alt="" /></a></div>
    <div class="middleNav">
    	
    </div>
    <div class="fix"></div>
</div>


<!-- Content wrapper -->
<div class="wrapper">

   
    <div class="leftNav">
    </div>

    <!-- Content -->
    <div class="content">
    	<div class="title"><h5><?=isset($title)?$title:'EVES'?></h5></div>

	<div class="widget">

	    <div class="head"><h5 class="iImage2">Change Password</h5></div>

	    	<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
				<fieldset>

			        <div class="rowElem noborder">
						<?=form_label('Old Password','old_password')?>
						<div class="formRight">
							<?=form_password('old_password',set_value('old_password'))?>
						</div>
						<?=form_error('old_password')?>
						<?=isset($errors['old_password'])?$errors['old_password']:''?>
						<div class="fix"></div>
					</div>

					<div class="rowElem">
						<?=form_label('New Password','new_password')?>
						<div class="formRight">
							<?=form_password('new_password')?>
						</div>
						<?=form_error('new_password')?>
						<div class="fix"></div>
					</div>

					<div class="rowElem">
						<?=form_label('Confirm New Password','confirm_new_password')?>
						<div class="formRight">
							<?=form_password('confirm_new_password')?>
						</div>
						<?=form_error('confirm_new_password')?>
						<div class="fix"></div>
					</div>

					<?=form_submit('submit','Change Password','class="greyishBtn submitForm"')?>
 				</fieldset>
			<?=form_close()?>

	</div>

<?$this->load->view('footer')?>