<?$this->load->view('header')?>

<?if($this->session->flashdata('success')):?>
	 <!-- Notification messages -->
        <div class="pt20">
	        <div class="nNote nSuccess hideit">
	            <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
	        </div>  
	    </div>
<?endif?>

<?if($customers->exists()):?>
	<div class="widget first">
		<div class="head"><h5 class="iFrames">List of Customers</h5></div>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
			<thead>
				<tr>
					<td>First name</td>
					<td>Last name</td>
					<td>Phone</td>
					<td>Company</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?foreach($customers->all as $c):?>
					<tr>
						<td><a href="<?=site_url('customers/view/'.$c->id)?>"><?=$c->first_name?></a></td>
						<td><?=$c->last_name?></td>
						<td><?=$c->phone?></td>
						<td><?=$c->company?></td>
						<td>
							<a href="<?=site_url('customers/edit/'.$c->id)?>">Edit</a> | 
							<a href="<?=site_url('customers/delete/'.$c->id)?>">Delete</a>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
		</table>
	</div>
<?else:?>
	<div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>No Customers!</p>
        </div>
    </div>
<?endif?>

<br/><br/>
<a href="<?=site_url('customers/create')?>" title="Create new customer" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/add.png" alt="" class="icon" /><span>Create new customer</span></a>

<?$this->load->view('footer')?>