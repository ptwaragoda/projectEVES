<?$this->load->view('header')?>

<?=(isset($errors) && $errors->user)?$errors->user:''?>

<?/* This is to see ALL the errors

<?=$errors->string?>

*/?>

<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('Transaction Date','trans_date')?>
			<div class="formRight">
				<?=form_input('trans_date',$this->input->post('trans_date'),' class="datepicker"')?>
			</div>
			<?=(isset($errors) && $errors->trans_date)?$errors->trans_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Start date','start_date')?>
			<div class="formRight">
				<?=form_input('start_date',$this->input->post('start_date'),' class="datepicker"')?>
			</div>
			<?=(isset($errors) && $errors->start_date)?$errors->start_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('End date','end_date')?>
			<div class="formRight">
				<?=form_input('end_date',$this->input->post('end_date'),' class="datepicker"')?>
			</div>
			<?=(isset($errors) && $errors->end_date)?$errors->end_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Tax amount','tax')?>
			<div class="formRight">
				<?=form_input('tax',$this->input->post('tax'))?>
			</div>
			<?=(isset($errors) && $errors->tax)?$errors->tax:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Customers','customer')?>
			<div class="formRight">
				<select data-placeholder="Choose a customer" id="customer" name="customer">
					<option value="">Select a Customer</option>
					<?foreach($customers->all as $c):?>
						<option value="<?=$c->id?>"><?=$c->getFullName()?></option>
					<?endforeach?>
				</select>
			</div>
			<?=(isset($errors) && $errors->customer)?$errors->customer:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Create Transaction','class="greyishBtn submitForm"')?>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
