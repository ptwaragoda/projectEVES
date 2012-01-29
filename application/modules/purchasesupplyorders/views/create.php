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

<h1>Create Supply</h1>

<?/*<?if(isset($errors)):?>
	<div><?=$errors->string?></div>
<?endif?>*/?>

<pre>
	<?print_r($_POST)?>
</pre>

<?=form_open($this->uri->uri_string())?>

<?=form_label('Start Date','start_date')?><br/>
<?=form_input('start_date',$this->input->post('start_date'))?><br/>
<?=(isset($errors) && $errors->start_date)?$errors->start_date:''?>

<?=form_label('End Date','end_date')?><br/>
<?=form_input('end_date',$this->input->post('end_date'))?><br/>
<?=(isset($errors) && $errors->end_date)?$errors->end_date:''?>

<?=form_label('Payment Status','payment_status')?><br/>
<?=form_input('payment_status',$this->input->post('payment_status'))?><br/>
<?=(isset($errors) && $errors->payment_status)?$errors->payment_status:''?>

<?=form_label('Quantity','quantity')?><br/>
<?=form_input('quantity',$this->input->post('quantity'))?><br/>
<?=(isset($errors) && $errors->quantity)?$errors->quantity:''?>

<?=form_label('Description','description')?><br/>
<?=form_input('description',$this->input->post('description'))?><br/>
<?=(isset($errors) && $errors->description)?$errors->description:''?>

<?=form_label('Price','price')?><br/>
<?=form_input('price',$this->input->post('price'))?><br/>
<?=(isset($errors) && $errors->price)?$errors->price:''?>

<br/><br/><?=form_submit('submit','Create Customer')?>

<?=form_close()?>
</body>
</html>