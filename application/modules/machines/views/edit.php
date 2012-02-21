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
			<?=form_label('Machine name','name')?>
			<div class="formRight">
				<?=form_input('name',$machines->name)?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Square feet','cover_square_feet')?>
			<div class="formRight">
				<?=form_input('cover_square_feet',$machines->cover_square_feet)?>
			</div>
			<?=(isset($errors) && $errors->cover_square_feet)?$errors->cover_square_feet:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Purchase Date','purchase_date')?>
			<div class="formRight">
				<?=form_input('purchase_date',$machines->purchase_date)?>
			</div>
			<?=(isset($errors) && $errors->purchase_date)?$errors->purchase_date:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Serial Number','serial_num')?>
			<div class="formRight">
				<?=form_input('serial_num',$machines->serial_num)?>
			</div>
			<?=(isset($errors) && $errors->serial_num)?$errors->serial_num:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Status','status_id')?>
			<div class="formRight">
				<?=form_input('status_id',$machines->status_id)?>
			</div>
			<?=(isset($errors) && $errors->status_id)?$errors->status_id:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Machine Model','machinemodel_id')?>
			<div class="formRight">
				<?=form_input('machinemodel_id',$machines->machinemodel_id)?>
			</div>
			<?=(isset($errors) && $errors->machinemodel_id)?$errors->machinemodel_id:''?>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Update Machine','class="greyishBtn submitForm"')?>
 
 <a href="<?=site_url('machines')?>" title="Machine List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machines List</span></a>
        
 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>