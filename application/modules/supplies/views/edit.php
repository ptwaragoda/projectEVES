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
			<?=form_label('Name','name')?>
			<div class="formRight">
				<?=form_input('name',$supply->name)?>
			</div>
			<?=(isset($errors) && $errors->name)?$errors->name:''?>
			<div class="fix"></div>
		</div>

		<div class="rowElem">
			<?=form_label('Price','price')?>
			<div class="formRight">
				<?=form_input('price',$supply->price)?>
			</div>
			<?=(isset($errors) && $errors->price)?$errors->price:''?>
			<div class="fix"></div>
		</div>

		
		<?=form_submit('submit','Update Supply','class="greyishBtn submitForm"')?>
		
		<a href="<?=site_url('supplies')?>" title="Supplies List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Supplies List</span></a>

 </fieldset>
<?=form_close()?>




<?$this->load->view('footer')?>