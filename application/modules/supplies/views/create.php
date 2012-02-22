<?$this->load->view('header')?>
   <?if(isset($errors)):?>
	<div><?=$errors->string?></div>
<?endif?>

<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('Name','name')?>
			<div class="formRight">
				<?=form_input('name',$this->input->post('name'))?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Price','price')?>
			<div class="formRight">
				<?=form_input('price',$this->input->post('price'))?>
			</div>
			<?=(isset($errors) && $errors->price)?$errors->price:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Create Supply','class="greyishBtn submitForm"')?>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
