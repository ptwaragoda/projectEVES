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
			<?=form_label('Machine Brand name','machine_brand_name')?>
			<div class="formRight">
				<?=form_input('machine_brand_name',$machinebrands->machine_brand_name)?>
			</div>
			<?=(isset($errors) && $errors->machine_brand_name)?$errors->machine_brand_name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Brand Serial Number','machine_brand_serialnum')?>
			<div class="formRight">
				<?=form_input('machine_brand_serialnum',$machinebrands->machine_brand_serialnum)?>
			</div>
			<?=(isset($errors) && $errors->machine_brand_serialnum)?$errors->machine_brand_serialnum:''?>
			<div class="fix"></div>
		</div>
		<?=form_submit('submit','Update Machine Brand','class="greyishBtn submitForm"')?>
 
 <a href="<?=site_url('machinebrands')?>" title="Machine Brand List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine Brand List</span></a>
        
 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>