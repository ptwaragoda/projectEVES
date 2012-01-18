<?$this->load->view('admin/header')?>		
		<div id="welcome" class="x12" style="width:952px">
		<?/*<div>
			<?=$deal->error->photo?>
		</div>*/?>
		<?=form_open_multipart($this->uri->uri_string(),'class="form label-inline uniform"')?>
			
			<?=printFormInput('title','Title',$this->input->post('title'),$deal->error->title)?>
			<?=printFormInput('company_name','Company Name',$this->input->post('company_name'),$deal->error->company_name)?>
			<?=printFormInput('price','Price',$this->input->post('price'),$deal->error->price)?>
			<?=printFormInput('original_price','Original Price',$this->input->post('original_price'),$deal->error->original_price)?>
			<?=printFormInput('phone','Phone Number',$this->input->post('phone'),$deal->error->phone)?>
			<?=printFormInput('video','Video URL',$this->input->post('video'),$deal->error->video)?>
			<?=printFormInput('meta_keywords','Meta Keywords',$this->input->post('meta_keywords'),$deal->error->meta_keywords)?>
			<?=printFormTextarea('description','Description',$this->input->post('description'),$deal->error->description,'600','600',TRUE)?>
			<?=printFormTextarea('short_description','Short Description',$this->input->post('short_description'),$deal->error->short_description)?>
			<?=printFormTextarea('fine_print','Fine Print',$this->input->post('fine_print'),$deal->error->fine_print)?>
			<?=printFormTextarea('address','Address',$this->input->post('address'),$deal->error->address)?>
			<?=printFormTextarea('paypal','Paypal Code',$this->input->post('paypal'),$deal->error->paypal)?>
			<?=printFormFileUpload('photo','Photo',$deal->error->photo.' '.(isset($fileerrors)?$fileerrors:''))?>
			
			
			<div class="field">
				<label for="type">Category </label>
				<select name="category" id="category" class="medium">

					<optgroup label="Deal Categories">
						<?foreach($categories->all as $c):?>
							<option value="<?=$c->id?>" <?=($c->id == $this->input->post('category'))?'selected="selected"':''?>><?=$c->name?></option>
						<?endforeach?>
					</optgroup>
				</select>
				<?=($deal->error->category?'<div class="error">'.$deal->error->category.'</div>':'')?>
			</div>

			<?=printFormInputDate('start_date','Start Date',$this->input->post('start_date'),$deal->error->start_date)?>
			<?=printFormInputDate('end_date','End Date',$this->input->post('end_date'),$deal->error->end_date)?>

			<?/*
				'network_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'category_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'user_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'photo_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'status_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'end_date' => array('type' => 'DATETIME', 'null' => FALSE),
				'start_date' => array('type' => 'DATETIME', 'null' => FALSE)
			*/?>

			<div class="buttonrow">
				<button class="btn btn-black">Create Deal</button>
			</div>

		<?=form_close()?>
			
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>