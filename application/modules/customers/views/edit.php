<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>


<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>
		<div class="rowElem noborder">
			<?=form_label('First name','first_name')?>
			<div class="formRight">
				<?=form_input('first_name',$customer->first_name)?>
			</div>
			<?=(isset($errors) && $errors->first_name)?$errors->first_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Last name','last_name')?>
			<div class="formRight">
				<?=form_input('last_name',$customer->last_name)?>
			</div>
			<?=(isset($errors) && $errors->last_name)?$errors->last_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Email Address','email')?>
			<div class="formRight">
				<?=form_input('email',$customer->email)?>
			</div>
			<?=(isset($errors) && $errors->email)?$errors->email:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Company name','company')?>
			<div class="formRight">
				<?=form_input('company',$customer->company)?>
			</div>
			<?=(isset($errors) && $errors->company)?$errors->company:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Phone','phone')?>
			<div class="formRight">
				<?=form_input('phone',$customer->phone)?>
			</div>
			<?=(isset($errors) && $errors->phone)?$errors->phone:''?>
			<div class="fix"></div>
		</div>
		<?=form_submit('submit','Update Customer','class="greyishBtn submitForm"')?>
		<a href="<?=site_url('customers')?>" title="Customers List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Customers List</span></a>
 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>