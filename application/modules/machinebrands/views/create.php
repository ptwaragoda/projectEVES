<?$this->load->view('header')?>
        	
<?=form_open(current_url(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('Brand Name','machine_brand_name')?>
			<div class="formRight">
				<?=form_input('name',$this->input->post('name'))?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Brand Serial Number','serial_number')?>
			<div class="formRight">
				<?=form_input('serial_number',$this->input->post('serial_number'))?>
			</div>
			<?=(isset($errors) && $errors->serial_number)?$errors->serial_number:''?>
			<div class="fix"></div>
		</div>
		<?=form_submit('submit','Create Machine Brand','class="greyishBtn submitForm"')?>

		<a href="<?=site_url('machinebrands')?>" title="Machine Brand List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine Brand List</span></a>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
