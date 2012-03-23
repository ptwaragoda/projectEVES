<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>EVES<?=isset($title)?' &raquo; '.$title:''?></title>

<link href="<?=base_url()?>public/css/main.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

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

<script type="text/javascript" src="<?=base_url()?>public/js/custom.js"></script>

</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="backTo"><a href="<?=base_url()?>" title=""><img src="<?=base_url()?>public/images/icons/topnav/mainWebsite.png" alt="" /><span>EVES</span></a></div>
            <div class="userNav">
                <ul>
                    <li><a href="<?=site_url('contact')?>" title=""><img src="<?=base_url()?>public/images/icons/topnav/contactAdmin.png" alt="" /><span>Contact</span></a></li>
                    <li><a href="<?=site_url('help')?>" title=""><img src="<?=base_url()?>public/images/icons/topnav/help.png" alt="" /><span>Help</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<div style="width:320px;margin:0 auto;margin-top:70px">
	<?=form_error('login'); ?><?=isset($errors['login'])?$errors['login']:''; ?>
	<?=form_error('password'); ?><?=isset($errors['password'])?$errors['password']:''; ?>
</div>

<!-- Login form area -->
<div class="loginWrapper">
	<div class="loginLogo"><img src="<?= site_url('public/images/loginLogo.png')?>" alt="" /></div>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Login</h5></div>
        <?=form_open(current_url(),array('id'=>'valid','class'=>'mainForm'))?>
            <fieldset>
                <div class="loginRow noborder">
                    <label for="req1">Username:</label>
                    <div class="loginInput"><input type="text" name="login" id="req1" value="<?=set_value('login')?>"/></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label for="req2">Password:</label>
                    <div class="loginInput"><input type="password" name="password" id="req2" /></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <div class="rememberMe"><input type="checkbox" id="check2" name="chbox" /><label for="check2">Remember me</label></div>
                    <input type="submit" value="Log me in" class="greyishBtn submitForm" />
                    <div class="fix"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<!-- Footer -->
<div id="footer">
	<div class="wrapper">
    	<span>&copy; Copyright <?=date('Y')?>.
    	<?/* All rights reserved. It's Brain admin theme by <a href="#" title="">Eugene Kopyov</a>*/?>
    	</span>
    </div>
</div>

</body>
</html>






<?/*













<!DOCTYPE html>
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>Login | Dashboard Admin</title> 
	
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/reset.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/text.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/form.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/buttons.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/login.css" type="text/css" media="screen" title="no title" />

</head> 
 
<body> 

<div id="login">
	<h1>Dashboard</h1>
	<div id="login_panel">
			<?=form_open($this->uri->uri_string())?>
			<div class="login_fields">
				<div class="error"><?=validation_errors()?></div>
				<div class="field">
					<label for="email">Email</label>
					<input type="text" name="login" value="<?=set_value('login')?>" id="email" tabindex="1" placeholder="email@example.com" />		
				</div>
				
				<div class="field">
					<label for="password">Password <small><a href="javascript:;">Forgot Password?</a></small></label>
					<input type="password" name="password" value="" id="password" tabindex="2" placeholder="password" />			
				</div>
			</div> <!-- .login_fields -->
			
			<div class="login_actions">
				<button type="submit" class="btn btn-orange" tabindex="3">Login</button>
			</div>
		</form>
	</div> <!-- #login_panel -->		
</div> <!-- #login -->

</body> 
 
</html>*/?>