<?$this->load->view('admin/header')?>		
		<div id="welcome" class="x12" style="width:952px">
		<?if(isset($success)):?>
			<div class="success" style="display:none"><?=$success?></div>
		<?endif?>
		
		<div>
			<?=$page->error->string?>
		</div>
		<?=form_open($this->uri->uri_string(),'class="form label-inline uniform"')?>
			
			<?=printFormInput('title','Title',$page->title,$page->error->title)?>
			<?=printFormTextarea('description','Description',$page->description,$page->error->description,'600','600',TRUE)?>
			<?=printFormInput('meta_keywords','Meta Keywords',$page->meta_keywords,$page->error->meta_keywords)?>
			<?=printFormTextarea('meta_description','Meta Description',$page->meta_description,$page->error->meta_description)?>

			<div class="buttonrow">
				<button class="btn btn-black">Update Page</button>
			</div>

		<?=form_close()?>
			
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>
