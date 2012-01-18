<?$this->load->view('header')?>
    <div id="main" role="main">
		
		<div id="left-col">
			<div id="todays-deal">
				<h2>Submit a Bizingah!</h2>
				<div id="static-content">
					
					<?=form_open($this->uri->uri_string())?>
						<table class="contactTable">
						<tr>
							<th style="width:150px">First Name</th>
							<td>
								<?=form_input('first_name', $this->input->post('first_name'))?>
								<?=form_error('first_name')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Last Name</th>
							<td>
								<?=form_input('last_name', $this->input->post('last_name'))?>
								<?=form_error('last_name')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Deal Title</th>
							<td>
								<?=form_input('title', $this->input->post('title'))?>
								<?=form_error('title')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Deal Description</th>
							<td>
								<?=form_textarea('description', $this->input->post('description'))?>
								<?=form_error('description')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Company Name</th>
							<td>
								<?=form_input('company_name', $this->input->post('company_name'))?>
								<?=form_error('company_name')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Email</th>
							<td>
								<?=form_input('email', $this->input->post('email'))?>
								<?=form_error('email')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Phone</th>
							<td>
								<?=form_input('phone', $this->input->post('phone'))?>
								<?=form_error('phone')?>
							</td>
						</tr>
						<tr>
							<th style="width:150px">Address</th>
							<td>
								<?=form_textarea('address', $this->input->post('address'))?>
								<?=form_error('address')?>
							</td>
						</tr>						
						</table>
						<p><?=form_submit('submit','Submit')?></p>
					<?=form_close()?>
					
				</div><!-- /static-content -->
			</div><!-- /todays-deal -->
			
		</div><!-- /left-col -->
		
		<?$this->load->view('sidebar')?>
		
    </div><!-- /main -->

<?$this->load->view('footer')?>