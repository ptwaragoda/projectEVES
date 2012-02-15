<h1>List of Suupplies</h1>

<?if($this->session->flashdata('success')):?>
	<div><?=$this->session->flashdata('success')?></div>
<?endif?>

<?if($purchasesupplyorders->exists()):?>
	<table>
	<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>Phone</th>
		<th>Company</th>
		<th>Actions</th>
	</tr>
	<?foreach($purchasesupplyorders->all as $c):?>
	<tr>
		<td><a href="<?=site_url('customers/view/'.$c->id)?>"><?=$c->first_name?></a></td>
		<td><?=$c->last_name?></td>
		<td><?=$c->phone?></td>
		<td><?=$c->company?></td>
		<td>
			<a href="<?=site_url('customers/edit/'.$c->id)?>">Edit</a>
			<a href="<?=site_url('customers/delete/'.$c->id)?>">Delete</a>
		</td>
	</tr>
	<?endforeach?>
	</table>
<?else:?>
	<p> No Supplies yet</p>
<?endif?>

<br/><br/>
<a href="<?=site_url('purchasesupplyorders/create')?>">Create new supply</a>