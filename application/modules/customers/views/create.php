<?$this->load->view('header')?>

<?/*<?if(isset($errors)):?>
	<div><?=$errors->string?></div>
<?endif?>*/?>

<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('First name','first_name')?>
			<div class="formRight">
				<?=form_input('first_name',$this->input->post('first_name'))?>
			</div>
			<?=(isset($errors) && $errors->first_name)?$errors->first_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Last name','last_name')?>
			<div class="formRight">
				<?=form_input('last_name',$this->input->post('last_name'))?>
			</div>
			<?=(isset($errors) && $errors->last_name)?$errors->last_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Email Address','email')?>
			<div class="formRight">
				<?=form_input('email',$this->input->post('email'))?>
			</div>
			<?=(isset($errors) && $errors->email)?$errors->email:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Company name','company')?>
			<div class="formRight">
				<?=form_input('company',$this->input->post('company'))?>
			</div>
			<?=(isset($errors) && $errors->company)?$errors->company:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Company Address','company_address')?>
			<div class="formRight">
				<?=form_input('company_address',$this->input->post('company_address'))?>
			</div>
			<?=(isset($errors) && $errors->company_address)?$errors->company_address:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Phone','phone')?>
			<div class="formRight">
				<?=form_input('phone',$this->input->post('phone'))?>
			</div>
			<?=(isset($errors) && $errors->phone)?$errors->phone:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Create Customer','class="greyishBtn submitForm"')?>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
