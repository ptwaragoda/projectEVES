<?$this->load->view('header')?>

<?=form_open($this->uri->uri_string(),array('class'=>'mainForm'))?>
	<fieldset>

		<div class="rowElem noborder">
			<?=form_label('Groups','group')?>
			<div class="formRight">
				<select data-placeholder="Choose a group" id="group" name="group">
					<option value="">Choose a group</option>
					<?foreach($groups->all as $g):?>
						<option value="<?=$g->id?>" <?=$g->id == $user->group_id?' selected="selected"':''?>><?=$g->name?></option>
					<?endforeach?>
				</select>
			</div>
			<div class="fix"></div>
		</div>

		<?=form_submit('submit','Assign user to group','class="greyishBtn submitForm"')?>

		<a href="<?=site_url('usermanager')?>" title="Users List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Users List</span></a>
 </fieldset>
<?=form_close()?>

<?$this->load->view('footer')?>
