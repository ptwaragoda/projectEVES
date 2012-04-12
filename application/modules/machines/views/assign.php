<?$this->load->view('header')?>

<?/*<?=$errors->string?>*/?>


<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>

		<div class="rowElem noborder">
			<?=form_label('Agents','agent')?>
			<div class="formRight">
				<select data-placeholder="Choose an agent" id="agent" name="agent">
					<option value="">Choose an agent</option>
					<?foreach($agents->all as $a):?>
						<option value="<?=$a->id?>" <?=$a->id == $machine->user_id?' selected="selected"':''?>><?=$a->username?></option>
					<?endforeach?>
				</select>
			</div>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Assign Agent to Machine','class="greyishBtn submitForm"')?>

		<a href="<?=site_url('machines')?>" title="Machine List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine List</span></a>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
