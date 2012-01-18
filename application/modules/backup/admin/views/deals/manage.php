<?$this->load->view('admin/header')?>		
		<div id="welcome" class="x12">
			
			<table cellpadding="0" cellspacing="0" border="0" class="data display " id="datatable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Status</th>
						<th>User</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="7" class="dataTables_empty">Loading data from server</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th><input class="span3" type="text" name="id" placeholder="Id"></th>
						<th><input class="span3" type="text" name="title" placeholder="Title"></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th> </th>
					</tr>
				</tfoot>
			</table>
			
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->
		
		<div id="welcome" class="x12">
			<?if($this->session->flashdata('success')):?>
				<div class="success" style="display:none"><?=$this->session->flashdata('success')?></div>
			<?endif?>
			<h2>Featured Deal</h2>
			<?=form_open('admin/dealmanager/featureDeal','class="form label-inline uniform"')?>
				<div class="field">
					<p>
						<?
							$m = new Meta();
							$m->get_by_key('featured_deal');
							
							$featured_deal = new Deal();
							$featured_deal->get_by_id($m->value);
						?>
						<strong>Currently Featured Deal:</strong> 
						<?if($featured_deal->exists()):?>
							<a target="_blank" href="<?=site_url('deals/view/'.$featured_deal->id.'/'.url_title($featured_deal->title,'underscore'))?>">
								<?=$featured_deal->title?>
							</a>
						<?endif?>
					</p>
					<label for="type">Select Deal</label>
					<select name="deal" id="deal" class="medium">
						<?
							$today = date('Y-m-d H:i:s');
							$currentDeals = new Deal();
							$currentDeals->where('start_date <=', $today)->where('end_date >=', $today)->where('dealstatus_id','2')->get();
						?>
						<optgroup label="Deal Categories">
							<?foreach($currentDeals->all as $d):?>
								<option value="<?=$d->id?>"><?=$d->title?></option>
							<?endforeach?>
						</optgroup>
					</select>
				</div>
				<div class="buttonrow">
					<button class="btn btn-black">Feature</button>
				</div>
			<?=form_close()?>
		</div> <!-- .x12 -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

<?$this->load->view('footer')?>