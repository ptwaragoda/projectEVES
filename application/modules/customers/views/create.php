<html>
<head>
	<title>Create Customer</title>
	<style type="text/css">
		div.error{
			color:red;
			font-weight:bold;
		}
	</style>
</head>
<body>

<h1>Create Customer</h1>

<?/*<?if(isset($errors)):?>
	<div><?=$errors->string?></div>
<?endif?>*/?>

<pre>
	<?print_r($_POST)?>
</pre>

<?=form_open($this->uri->uri_string())?>

<?=form_label('First name','first_name')?><br/>
<?=form_input('first_name',$this->input->post('first_name'))?><br/>
<?=(isset($errors) && $errors->first_name)?$errors->first_name:''?>

<?=form_label('Last name','last_name')?><br/>
<?=form_input('last_name',$this->input->post('last_name'))?><br/>
<?=(isset($errors) && $errors->last_name)?$errors->last_name:''?>

<?=form_label('Email Address','email')?><br/>
<?=form_input('email',$this->input->post('email'))?><br/>
<?=(isset($errors) && $errors->email)?$errors->email:''?>

<?=form_label('Company name','company')?><br/>
<?=form_input('company',$this->input->post('company'))?><br/>
<?=(isset($errors) && $errors->company)?$errors->company:''?>

<?=form_label('Phone','phone')?><br/>
<?=form_input('phone',$this->input->post('phone'))?><br/>
<?=(isset($errors) && $errors->phone)?$errors->phone:''?>

<br/><br/><?=form_submit('submit','Create Customer')?>

<?=form_close()?>
</body>
</html>