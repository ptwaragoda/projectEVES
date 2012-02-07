<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($machinemodels->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of MachineModels</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Brand ID</td>
					<td>Brand Name</td>
					<td>Model Name</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($machinemodels->all as $mm):?>
					<tr>
						<td><?=$mm->id?></td>
						<td><a href="<?=site_url('machinemodels/view/'.$mm->id)?>"><?=$mm->brand_name?></a></td>
						<td><?=$mm->model_name?></td>
						<td>
							<a href="<?=site_url('machinemodels/edit/'.$mm->id)?>">Edit</a> | 
							<a href="<?=site_url('machinemodels/delete/'.$mm->id)?>">Delete</a>
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
<a href="<?=site_url('machinemodels/create')?>" title="Create new Machine Model" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create new Machine Model</span></a>

<?$this->load->view('footer')?>