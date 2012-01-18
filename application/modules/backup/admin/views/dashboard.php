<?$this->load->view('admin/header')?>		
		<div id="welcome" class="x12">			
			
			<p>
				<strong>Welcome back <?=$this->tank_auth->get_username()?>!</strong><br />
				Use the top menu to access various areas of the administrative backend.</a>
			</p>
			
			<table class="data info_table">
				<tbody>
					<tr>
						<td class="value"><?=$total_deals->count()?></td>
						<td class="full">Total deals to date</td>
					</tr>
					<tr>
						<td class="value"><?=$active_deals->count()?></td>
						<td class="full">Active deals</td>
					</tr>
					<tr>
						<td class="value"><?=$unpublished_deals->count()?></td>
						<td class="full">Unpublished deals</td>
					</tr>
				</tbody>
			</table>
			
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>