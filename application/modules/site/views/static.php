<?$this->load->view('header')?>
    <div id="main" role="main">
		
		<div id="left-col">
			<?if(isset($page)):?>
			<div id="todays-deal">
				<h2><?=$page->title?></h2>
				<div id="static-content">
					<?=$page->description?>
					<?if($this->uri->uri_string() == 'help'):?>
						<?$this->load->view('site/getsatisfaction')?>
					<?endif?>
				</div><!-- /static-content -->
			</div><!-- /todays-deal -->
			<?else:?>
			<div id="todays-deal" style="min-height:400px">
				<h2><?=$heading?></h2>
				<div id="static-content">
					<?=$message?>
				</div><!-- /static-content -->
			</div><!-- /todays-deal -->
			<?endif?>
			
		</div><!-- /left-col -->
		
		<?$this->load->view('sidebar')?>
		
    </div><!-- /main -->

<?$this->load->view('footer')?>