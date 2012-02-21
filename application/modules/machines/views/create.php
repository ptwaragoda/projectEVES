<?$this->load->view('header')?>

<?/*<?=$errors->string?>*/?>


<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('name','name')?>
			<div class="formRight">
				<?=form_input('name',$this->input->post('name'))?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('square feet','cover_square_feet')?>
			<div class="formRight">
				<?=form_input('cover_square_feet',$this->input->post('cover_square_feet'))?>
			</div>
			<?=(isset($errors) && $errors->cover_square_feet)?$errors->cover_square_feet:''?>
			<div class="fix"></div>
		</div>
		
		<div class="rowElem">
			<?=form_label('Purchase Date','purchase_date')?>
			<div class="formRight">
				<?=form_input('purchase_date',$this->input->post('purchase_date'),' class="datepicker"')?>
			</div>
			<?=(isset($errors) && $errors->purchase_date)?$errors->purchase_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Serial Number','serial_num')?>
			<div class="formRight">
				<?=form_input('serial_num',$this->input->post('serial_num'))?>
			</div>
			<?=(isset($errors) && $errors->serial_num)?$errors->serial_num:''?>
			<div class="fix"></div>
		</div>		

		<div class="rowElem">
			<?=form_label('Status','status')?>
			<div class="formRight">
				<select data-placeholder="Choose a status" id="status" name="status">
					<option value="">Select a status</option>
					<?foreach($statuses->all as $s):?>
						<option value="<?=$s->id?>" <?=$s->id == $this->input->post('status')?' selected="selected"':''?>><?=$s->name?></option>
					<?endforeach?>
				</select>
			</div>
			<?=(isset($errors) && $errors->status)?$errors->status:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Model','machinemodel')?>
			<div class="formRight">
				<select data-placeholder="Choose a model" id="machinemodel" name="machinemodel">
					<option value="">Select a model</option>
					<?foreach($machinemodels->all as $mm):?>
						<option value="<?=$mm->id?>" <?=$mm->id == $this->input->post('machinemodel')?' selected="selected"':''?>><?=$mm->machinebrand_name?> &raquo; <?=$mm->name?></option>
					<?endforeach?>
				</select>
			</div>
			<?=(isset($errors) && $errors->machinemodel)?$errors->machinemodel:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Create Machine','class="greyishBtn submitForm"')?>

		<a href="<?=site_url('machines')?>" title="Machine List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine List</span></a>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
