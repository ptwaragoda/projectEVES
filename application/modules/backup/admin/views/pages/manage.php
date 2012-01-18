<?$this->load->view('admin/header')?>		
	<div id="welcome" class="x12">
			
		<h2>Basic Table</h2>
				
		<table class="data display">
			<thead>
				<tr>
					<th>Page Title</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($pages->all as $p):?>
					<tr class="<?=alternator('odd','even')?>">
						<td><?=$p->title?></td>
						<td><a href="<?=site_url('admin/pagemanager/edit/'.$p->id)?>">Edit</td>
					</tr>
				<?endforeach?>
				</tbody>
			</table>
			
		</div> <!-- .x12 -->
		
	<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>