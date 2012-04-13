<?$this->load->view('header')?>

<?if($purchasesupplyorders->exists()):?>
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">List of Fulfilled Purchase Supply Orders</h5>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Id</td>
					<td>Agent</td>
					<td>Created Date</td>
					<td>Total</td>
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
						<td>
							<a href="<?=site_url('purchasesupplyorders/view/'.$t->id)?>">View</a>
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
<a href="<?=site_url('purchasesupplyorders')?>" title="Create new Supply Order" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to pending supply orders</span></a>

<?$this->load->view('footer')?>