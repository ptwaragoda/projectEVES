<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($supplies->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of Supplies</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Supply ID</td>
					<td>Name</td>
					<td>Price</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($supplies->all as $s):?>
					<tr>
						<td><a href="<?=site_url('supplies/view/'.$s->id)?>"><?=$s->id?></a></td>
						<td><?=$s->name?></td>
						<td style="text-align:right"><?=$s->getPrice()?></td>						
						<td>
							<a href="<?=site_url('supplies/edit/'.$s->id)?>">Edit</a> | 
							<a href="<?=site_url('supplies/delete/'.$s->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Supplies!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('supplies/create')?>" title="Create new Supply" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create new supply</span></a>

<?$this->load->view('footer')?>