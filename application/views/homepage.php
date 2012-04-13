<?$this->load->view('header')?>

 <!-- Large buttons with icons and text -->

<?if($this->tank_auth->is_admin() || $this->tank_auth->is_manager() || $this->tank_auth->is_agent()):?>
	<?
        $u = new User();
        $u->get_by_id($this->tank_auth->get_user_id());
	?>
	<div class="widget">

	    <div class="head"><h5 class="iImage2">Quick Links</h5></div>

	    <div class="body aligncenter">

	        <?=dashboardLink('Customers',site_url('customers'),'users.png')?>
	        <?=dashboardLink('Machines',site_url('machines'),'robot.png')?>
	        <?if($u->is_admin() || $u->is_manager()):?>
	        <?=dashboardLink('Models',site_url('machinemodels'),'pencil.png')?>
	        <?=dashboardLink('Brands',site_url('machinebrands'),'companies.png')?>
	        <?endif?>
	        <?=dashboardLink('Supply Orders',site_url('purchasesupplyorders'),'cart3.png')?>
	        <?=dashboardLink('Transactions',site_url('transactions'),'cashRegister.png')?>

	    </div>

	</div>

	<?if($this->tank_auth->is_admin() || $this->tank_auth->is_manager()):?>
		<div class="widget">

		    <div class="head"><h5 class="iImage2">Administrative Links</h5></div>

		    <div class="body aligncenter">

		        <?if($this->tank_auth->is_admin() || $this->tank_auth->is_manager()):?>
		        	<?=dashboardLink('Users',site_url('users'),'adminUser.png')?>
		        	<?=dashboardLink('Backups',site_url('backups'),'refresh.png')?>
		        <?endif?>
		        <?/*<?if($this->tank_auth->is_admin()):?>
		        	<?=dashboardLink('Permissions',site_url('permissions'),'pencil.png','')?>
		        <?endif?>*/?>


		    </div>

		</div>
	<?endif?>
<?else:?>
	<p>You are not assigned to a user group. Please contact a manager</p>
<?endif?>

<?$this->load->view('footer')?>