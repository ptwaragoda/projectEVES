<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($transactions->exists()):?>
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">List of transactions
				<?if(isset($customer)):?> 
					(<?=$customer->getFullname()?>
					<a href="<?=current_url()?>">x</a>)
				<?endif?>
			</h5>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Id</td>
					<td>Customer</td>
					<td>Transaction Date</td>
					<td>Start Date</td>
					<td>End Date</td>
					<td>Created By</td>
					<td>Total</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($transactions->all as $t):?>
					<tr>
						<td><a href="<?=site_url('transaction/view/'.$t->id)?>"><?=$t->id?></a></td>
						<?/*<td><?=$t->customer->get()->getFullName()?></td>*/?>
						<td>
						<?$customer = $t->customer->get()?>
						<?if($customer->exists()):?>
							<a href="<?=current_url()?>?customer=<?=$customer->id?>">
								<?=$customer->getFullName()?>
							</a>
						<?else:?>
							No customer attached
						<?endif?>
						</td>
						<td><?=date('Y-m-d',strtotime($t->trans_date))?></td>
						<td><?=date('Y-m-d',strtotime($t->start_date))?></td>
						<td><?=date('Y-m-d',strtotime($t->end_date))?></td>
						<td><?=$t->user->get()->username?></td>
						<td><?=formatPrice($t->final_total)?></td>
						<td>
							<a href="<?=site_url('transaction/view/'.$t->id)?>">View</a> | 
							<a href="<?=site_url('transaction/edit/'.$t->id)?>">Edit</a> | 
							<a href="<?=site_url('transaction/delete/'.$t->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No transactions!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('transactions/create')?>" title="Create new transaction" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create New Transaction</span></a>

<?$this->load->view('footer')?>