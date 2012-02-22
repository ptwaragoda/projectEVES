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
			<?=form_label('Brand name','name')?>
			<div class="formRight">
				<?=form_input('name',$machinebrands->name)?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Brand Serial Number','serial_number')?>
			<div class="formRight">
				<?=form_input('serial_number',$machinebrands->serial_number)?>
			</div>
			<?=(isset($errors) && $errors->serial_number)?$errors->serial_number:''?>
			<div class="fix"></div>
		</div>
		<?=form_submit('submit','Update Machine Brand','class="greyishBtn submitForm"')?>
 
 <a href="<?=site_url('machinebrands')?>" title="Machine Brand List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine Brand List</span></a>
        
 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>