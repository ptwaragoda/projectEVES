<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($users->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of Users</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>ID</td>
					<td>username</td>
					<td>group</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($users->all as $u):?>
					<tr>
						<td><?=$u->id?></td>
						<td><?=$u->username?></a></td>
						<?$group = $u->group->get()?>
						<?if($group->exists()):?>
							<td><?=$group->name?></td>
						<?else:?>
							<td>Unassigned</td>
						<?endif?>
						<td>
							<a href="<?=site_url('usermanager/assign/'.$u->id)?>">Assign to Group</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Users!</p>
        </div>
    </div>
<?endif?>

<?$this->load->view('footer')?>