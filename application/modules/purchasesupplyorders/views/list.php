<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($purchasesupplyorders->exists()):?>
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">List of Purchase Supply Orders</h5>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Id</td>
					<td>Agent</td>
					<td>Created Date</td>
					<td>Total</td>
					<td>Is draft?</td>
					<td>Processed?</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($purchasesupplyorders->all as $t):?>
					<tr>
						<td><a href="<?=site_url('purchasesupplyorders/view/'.$t->id)?>"><?=$t->id?></a></td>
						<td><?=$t->user_username?></td>
						<td><?=date('Y-m-d',strtotime($t->created_on))?></td>
						<td><?=formatPrice($t->final_total)?></td>
						<td><?=$t->is_draft?'Yes':'No'?></td>
						<td><?=$t->is_paid?'Yes':'No'?></td>
						<td>
							<a href="<?=site_url('purchasesupplyorders/view/'.$t->id)?>">View</a> | 
							<a href="<?=site_url('purchasesupplyorders/edit/'.$t->id)?>">Edit</a> | 
							<a href="<?=site_url('purchasesupplyorders/delete/'.$t->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Purchase Supply Orders!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('purchasesupplyorders/create')?>" title="Create new transaction" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create New Transaction</span></a>

<?$this->load->view('footer')?>