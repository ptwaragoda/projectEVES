<?$this->load->view('header')?>

<?=(isset($errors) && $errors->user)?$errors->user:''?>

<?/* This is to see ALL the errors

<?=$errors->string?>

*/?>

<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		

		<div class="rowElem">
			<?=form_label('Tax amount','total')?>
			<div class="formRight">
				<?=form_input('total',$this->input->post('total'))?>
			</div>
			<?=(isset($errors) && $errors->total)?$errors->total:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Tax amount','final_total')?>
			<div class="formRight">
				<?=form_input('final_total',$this->input->post('final_total'))?>
			</div>
			<?=(isset($errors) && $errors->final_total)?$errors->final_total:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Choose Supplies','class="greyishBtn submitForm"')?>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
