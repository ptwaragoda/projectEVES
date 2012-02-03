<?$this->load->view('header')?>
        	<!-- Input text fields -->
            
               <?/* <div class="widget first">
                    <div class="head"><h5 class="iList">Create a new customer</h5></div>
                        <div class="rowElem noborder"><label>Usual input text:</label><div class="formRight"><input type="text" name="inputtext"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Input password:</label><div class="formRight"><input type="password" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Input with placeholder:</label><div class="formRight"><input type="text" name="inputtext" placeholder="enter your placeholder text here"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Input with autofocus:</label><div class="formRight"><input type="text" name="inputtext" class="autoF"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Read only field:</label><div class="formRight"><input type="text" readonly="readonly" value="Read only text goes here" name="inputtext"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Input with tooltip:</label><div class="formRight"><input type="text" name="inputtext" class="rightDir" title="Cool, huh?" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Disabled input field:</label><div class="formRight"><input type="text" disabled="disabled" value="Disabled field" name="inputtext"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>With predefined value:</label><div class="formRight"><input type="text" value="http://" name="inputtext"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>With max length:</label><div class="formRight"><input type="text" maxlength="20" placeholder="max 20 characters here" name="inputtext"/></div><div class="fix"></div></div>
              
                        <div class="rowElem"><label>Usual textarea:</label><div class="formRight"><textarea rows="8" cols="" name="textarea"></textarea></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Autogrowing textarea:</label><div class="formRight"><textarea rows="8" cols="" class="auto" name="textarea"></textarea></div><div class="fix"></div></div>
                        <input type="submit" value="Submit form" class="greyishBtn submitForm" />
                        <div class="fix"></div>

                </div>

                Oops sorry. That action is not valid, or our servers have gone bonkers*/?>
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
