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
			<?=form_label('Description','description')?>
			<div class="formRight">
				<?=form_input('description',$this->input->post('description'))?>
			</div>
			<?=(isset($errors) && $errors->description)?$errors->description:''?>
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
