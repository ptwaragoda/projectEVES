<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($machinebrands->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of Machine Brands</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Brand Serial Number</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($machinebrands->all as $mb):?>
					<tr>
						<td><?=$mb->id?></td>
						<td><a href="<?=site_url('machinebrands/view/'.$mb->id)?>"><?=$mb->name?></a></td>
						<td><?=$mb->serial_number?></td>
						<td>
							<a href="<?=site_url('machinebrands/edit/'.$mb->id)?>">Edit</a> | 
							<a href="<?=site_url('machinebrands/delete/'.$mb->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Machine Brands!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('machinebrands/create')?>" title="Create new machine brand" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create New Machine Brand</span></a>

<?$this->load->view('footer')?>