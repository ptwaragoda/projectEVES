<?$this->load->view('header')?>
        	
<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('Machine name','machine_name')?>
			<div class="formRight">
				<?=form_input('machine_name',$this->input->post('machine_name'))?>
			</div>
			<?=(isset($errors) && $errors->machine_name)?$errors->machine_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine square feet(measurement)','cover_square_feet')?>
			<div class="formRight">
				<?=form_input('cover_square_feet',$this->input->post('cover_square_feet'))?>
			</div>
			<?=(isset($errors) && $errors->cover_square_feet)?$errors->cover_square_feet:''?>
			<div class="fix"></div>
		</div>
		
		<div class="rowElem">
			<?=form_label('Machine Purchase Date','purchase_date')?>
			<div class="formRight">
				<?=form_input('purchase_date',$this->input->post('purchase_date'),' class="datepicker"')?>
			</div>
			<?=(isset($errors) && $errors->purchase_date)?$errors->purchase_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Serial Number','serial_num')?>
			<div class="formRight">
				<?=form_input('serial_num',$this->input->post('serial_num'))?>
			</div>
			<?=(isset($errors) && $errors->serial_num)?$errors->serial_num:''?>
			<div class="fix"></div>
		</div>		

		<div class="rowElem">
			<?=form_label('Machine Status','status_id')?>
			<div class="formRight">
				<?=form_input('status_id',$this->input->post('status_id'))?>
			</div>
			<?=(isset($errors) && $errors->status_id)?$errors->status_id:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Model','machinemodel_id')?>
			<div class="formRight">
				<?=form_input('machinemodel_id',$this->input->post('machinemodel_id'))?>
			</div>
			<?=(isset($errors) && $errors->machinemodel_id)?$errors->machinemodel_id:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Create Machine','class="greyishBtn submitForm"')?>

		<a href="<?=site_url('machines')?>" title="Machine List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine List</span></a>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
