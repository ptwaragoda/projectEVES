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
		
		<div class="rowElem">
			<?=form_label('Brand Name','machinebrand')?>
			<div class="formRight">
				<select data-placeholder="Choose a Brand" id="machinebrand" name="machinebrand">
					<option value="">Select Machine Brand</option>
					<?foreach($machinebrand->all as $mb):?>
						<option value="<?=$mb->id?>" <?=$mb->id == $machinemodel->machinebrand_id?' selected="selected"':''?>><?=$mb->name?></option>
					<?endforeach?>
				</select>
			</div>
			<?=(isset($errors) && $errors->machinebrand)?$errors->machinebrand:''?>
			<div class="fix"></div>
		</div>


		<div class="rowElem noborder">
			<?=form_label('Model Name','name')?>
			<div class="formRight">
				<?=form_input('name',$machinemodel->name)?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<? /*<div class="rowElem noborder">
			<?=form_label('Brand Name','machinebrand_name')?>
			<div class="formRight">
				<?=form_input('machinebrand_name',$machinemodel->machinebrand_name)?>
			</div>
<!-- TODO:// make sure the list of brand is a dropbox and not a text box
	TODO: fix the reletaionship so that it will update the record properly
-->
			<?=(isset($errors) && $errors->machinebrand_name)?$errors->machinebrand_name:''?>
			<div class="fix"></div>
		</div> */ ?>
		<?=form_submit('submit','Update Machine Model','class="greyishBtn submitForm"')?>
 
 <a href="<?=site_url('machinemodels')?>" title="Machine Model List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine Model List</span></a>
        
 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>