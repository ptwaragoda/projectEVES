<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($machines->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of Machines</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Machine ID</td>
					<td>Machine Name</td>
					<td>Machine Cover Square Feet</td>
					<td>Machine Purchase Date</td>
					<td>Machine Serial Number</td>
					<td>Machine Status</td>
					<td>Machine Model</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($machines->all as $m):?>
					<tr>
						<td><?=$m->id?></td>
						<td><a href="<?=site_url('machines/view/'.$m->id)?>"><?=$m->machine_name?></a></td>
						<td><?=$m->cover_square_feet?></td>
						<td><?=date('Y-m-d',strtotime($m->purchase_date))?></td>
						<td><?=$m->serial_num?></td>
						<td><?=$m->status_id?></td>
						<td><?=$m->machinemodel_id?></td>
						<td>
							<a href="<?=site_url('machines/edit/'.$m->id)?>">Edit</a> | 
							<a href="<?=site_url('machines/delete/'.$m->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Machines!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('machines/create')?>" title="Create New Machine" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create New Machine</span></a>

<?$this->load->view('footer')?>