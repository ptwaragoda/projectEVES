<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>Dashboard | Dashboard Admin</title> 
	
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/reset.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/text.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/form.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/buttons.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/grid.css" type="text/css" media="screen" title="no title" />	
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/layout.css" type="text/css" media="screen" title="no title" />	
	
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/ui-darkness/jquery-ui-1.8.12.custom.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/plugin/jquery.visualize.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/plugin/facebox.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/plugin/uniform.default.css" type="text/css" media="screen" title="no title" />
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/plugin/dataTables.css" type="text/css" media="screen" title="no title" />

	
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/jquery.notifyBar.css" type="text/css" media="screen" title="no title">
	<link rel="stylesheet" href="<?=base_url()?>public/admin/css/custom.css" type="text/css" media="screen" title="no title">

</head> 
 
<body> 

<div id="wrapper">
	
	<div id="top">
		
		<div class="content_pad">			
			<ul class="right">
				<li><a href="javascript:;" class="top_icon"><span class="ui-icon ui-icon-person"></span>Logged in as <?=$this->tank_auth->get_username()?></a></li>
				<?/*<li><a href="javascript:;" class="new_messages top_alert">1 New Message</a></li>
				<li><a href="./pages/settings.html">Settings</a></li>*/?>
				<li><a href="<?=site_url('auth/logout')?>">Logout</a></li>
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #top -->	
	
	<div id="header">
		
		<div class="content_pad">
			<h1><a href="<?=site_url('admin')?>">Dashboard Admin</a></h1>
			
			<ul id="nav">
				<li class="nav_current nav_icon"><a href="<?=site_url('admin')?>"><span class="ui-icon ui-icon-home"></span>Home</a></li>
				

				<li class="nav_dropdown nav_icon">
					<a href="<?=site_url('admin/dealmanager/manage')?>"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Deals</a>
					
					<div class="nav_menu">			
						<ul>
							<li><a href="<?=site_url('admin/dealmanager/add')?>">Create Deal</a></li>
							<li><a href="<?=site_url('admin/dealmanager/manage')?>">Manage Deals</a></li>
						</ul>
						
					</div>
				</li>
				
				<li class="nav_dropdown nav_icon">
					<a href="<?=site_url('admin/pagemanager/manage')?>"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Pages</a>
					
					<div class="nav_menu">			
						<ul>
							<?
								$pages = new Page();
								$pages->get();
							?>
							<?foreach($pages->all as $p):?>
								<li><a href="<?=site_url('admin/pagemanager/edit/'.$p->id)?>"><?=$p->title?></a></li>
							<?endforeach?>
						</ul>
						
					</div>
				</li>
				
				
				<?/*<li class="nav_icon"><a href="<?=site_url('admin/settingsManager/manage')?>"><span class="ui-icon ui-icon-gear"></span>Settings</a></li>*/?>
				<li class="nav_icon"><a href="#" onclick="alert('site statistics are handled by google analytics and woopra. This area is no longer active');return false;"><span class="ui-icon ui-icon-signal"></span>Statistics</a></li>
				
				<?/*<li class="nav_dropdown nav_icon_only">
					<a href="javascript:;">&nbsp;</a>
					
					<div class="nav_menu">
						
						<ul>
							<li><a href="javascript:;">Overflow Menu</a></li>
							<li><a href="javascript:;">Items Can</a></li>
							<li><a href="javascript:;">Go Here</a></li>
						</ul>
					</div> <!-- .menu -->
				</li>*/?>
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #header -->	

		<div id="masthead">
		
		<div class="content_pad">
			
			<h1 class="no_breadcrumbs"><?=$heading?></h1>
			
			<?/*<div id="search">
				<form action="/search" method="get">
					<input type="text" value="" placeholder="Search" name="search" id="search_input" title="Search" />					
					<input type="submit" value="" name="submit" class="submit" />					
				</form>
			</div> <!-- #search -->*/?>
			
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">