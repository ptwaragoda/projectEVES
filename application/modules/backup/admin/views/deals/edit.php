<?$this->load->view('admin/header')?>		
		<div id="welcome" class="x12" style="width:952px">
		<?if($this->session->flashdata('success')):?>
			<div class="success" style="display:none"><?=$this->session->flashdata('success')?></div>
		<?endif?>
		
		<div>
			<?=$deal->error->string?>
		</div>
		<?=form_open_multipart($this->uri->uri_string(),'class="form label-inline uniform"')?>
			
			<?=printFormInput('title','Title',$deal->title,$deal->error->title)?>
			<?=printFormInput('company_name','Company Name',$deal->company_name,$deal->error->company_name)?>
			<?=printFormInput('price','Price',$deal->price,$deal->error->price)?>
			<?=printFormInput('original_price','Original Price',$deal->original_price,$deal->error->original_price)?>
			<?=printFormInput('phone','Phone Number',$deal->phone,$deal->error->phone)?>
			<?=printFormInput('video','Video URL',$deal->video,$deal->error->video)?>
			<?=printFormInput('meta_keywords','Meta Keywords',$deal->meta_keywords,$deal->error->meta_keywords)?>
			<?=printFormTextarea('description','Description',$deal->description,$deal->error->description,'600','600',TRUE)?>
			<?=printFormTextarea('short_description','Short Description',$deal->short_description,$deal->error->short_description)?>
			<?=printFormTextarea('fine_print','Fine Print',$deal->fine_print,$deal->error->fine_print)?>
			<?=printFormTextarea('address','Address',$deal->address,$deal->error->address)?>
			<?=printFormTextarea('paypal','Paypal Code',$deal->paypal,$deal->error->paypal)?>
			<?=printFormFileUpload('photo','Photo',(isset($fileerrors)?$fileerrors:''))?>
			<?$photo = $deal->photo->get()?>
			<?if($photo->exists()):?>
				<div style="margin-left:150px">
					<img src="<?=getThumb($photo->url, '200')?>">
				</div>
			<?endif?>
			
			<div class="field">
				<label for="type">Category </label>
				<select name="category" id="category" class="medium">

					<optgroup label="Deal Categories">
						<?foreach($categories->all as $c):?>
							<option value="<?=$c->id?>" <?=($c->id == $deal->category_id)?'selected="selected"':''?>><?=$c->name?></option>
						<?endforeach?>
					</optgroup>
				</select>
				<?=($deal->error->category?'<div class="error">'.$deal->error->category.'</div>':'')?>
			</div>

			<?=printFormInputDate('start_date','Start Date',$deal->start_date,$deal->error->start_date)?>
			<?=printFormInputDate('end_date','End Date',$deal->end_date,$deal->error->end_date)?>

			<div class="buttonrow">
				<button class="btn btn-black">Update Deal</button>
			</div>

		<?=form_close()?>
			
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>