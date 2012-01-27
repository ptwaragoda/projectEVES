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

<h1>Edit Customer</h1>

<?if($this->session->flashdata('success')):?>
	<div><?=$this->session->flashdata('success')?></div>
<?endif?>

<?/*<?if(isset($errors)):?>
	<div><?=$errors->string?></div>
<?endif?>*/?>

<?=form_open($this->uri->uri_string())?>

<?=form_label('First name','first_name')?><br/>
<?=form_input('first_name',$customer->first_name)?><br/>
<?=(isset($errors) && $errors->first_name)?$errors->first_name:''?>

<?=form_label('Last name','last_name')?><br/>
<?=form_input('last_name',$customer->last_name)?><br/>
<?=(isset($errors) && $errors->last_name)?$errors->last_name:''?>

<?=form_label('Email Address','email')?><br/>
<?=form_input('email',$customer->email)?><br/>
<?=(isset($errors) && $errors->email)?$errors->email:''?>

<?=form_label('Company name','company')?><br/>
<?=form_input('company',$customer->company)?><br/>
<?=(isset($errors) && $errors->company)?$errors->company:''?>

<?=form_label('Phone','phone')?><br/>
<?=form_input('phone',$customer->phone)?><br/>
<?=(isset($errors) && $errors->phone)?$errors->phone:''?>

<br/><br/><?=form_submit('submit','Update Customer')?>

<?=form_close()?>
</body>
</html>