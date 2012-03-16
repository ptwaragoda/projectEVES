<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($this->session->flashdata('error')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nFailure hideit">
	            <p><strong>Error: </strong><?=$this->session->flashdata('error')?></p>
	        </div>  
	    </div>
<?endif?>

<?if(count($files)):?>
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">Database backups</h5>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>Filename</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($files as $f):?>
					<tr>
						<td><a href="<?=site_url('admin/backups/download/'.$f)?>"><?=$f?></a></td>
						<td>
							<a href="<?=site_url('admin/backups/delete/'.$f)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Database backups!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('admin/backups/create')?>" title="Create new backup" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create New Backup</span></a>

<?$this->load->view('footer')?>