<div id="right-col">
	<h1 id="logo"><a href="<?=base_url()?>">Bizingah!</a></h1>
	<div id="subscribe"><a target="_blank" href="http://www.emailmeform.com/builder/form/W7U96Emaef1k9cO6Z7Gy15Y"><img src="<?=base_url()?>public/img/subscribe.png" /></a></div>
	<div id="menu">
		<ul>
			<?
				$categories = new Category();
				$categories->include_related_count('deal')->order_by('name','asc')->get();
			?>
			<?foreach($categories->all as $c):?>
				<?
					$today = date('Y-m-d H:i:s');
					$deals = new Deal();
					$deals->where('start_date <=', $today)->where('end_date >=', $today)->where('dealstatus_id','2')->where_related_category('id',$c->id)->get();
				?>
				<?if(count($deals->all)):?>
					<li><a href="<?=site_url('category/'.$c->stub)?>"><?=$c->name?></a></li>
				<?else:?>
					<li><a><?=$c->name?></a></li>
				<?endif?>
			<?endforeach?>
		</ul>
	</div><!-- /menu -->
	<div style="margin-top:10px;text-align:center">
		<a target="_blank" href="https://www.facebook.com/groups/bizingah/"><img style="width:30px" src="<?=base_url()?>public/img/facebook.png" /></a>
		<a target="_blank" href="http://www.linkedin.com/groups/Bizingah-4223175"><img style="width:30px" src="<?=base_url()?>public/img/linkedin.png" /></a>
		<a target="_blank" href="http://www.youtube.com/bizingahdeals"><img style="width:30px" src="<?=base_url()?>public/img/youtube.png" /></a>
	</div>
</div><!-- /right-col -->
