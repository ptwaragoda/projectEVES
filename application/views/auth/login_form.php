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
 
</html>