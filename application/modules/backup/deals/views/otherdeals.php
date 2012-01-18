<?if(count($deals->all) == 0 || (count($deals->all) == 1 && $deals->id == $exclude)):?>
<?else:?>
<div id="other-deals">
	<h2><?=$header?></h2>
		<?foreach($deals->all as $d):?>
			<?if($d->id != $exclude):?>
				<div id="deal-thumb">
					<h4><?=$d->company_name?></h4>
					<h3><?=$d->title?></h3>
					<?$category = $d->category->get()?>
					<h5><a href="<?=site_url('category/'.$category->stub)?>"><?=$category->name?></a></h5>
					<div class="thumbnail"><a href="<?=site_url('deals/view/'.$d->id)?>"><img src="<?=getThumb($d->photo->get()->url,'130')?>" /></a></div>
					<?if($d->price && $d->original_price && $d->paypal):?>
					<div class="thumb-price"><span class="old-price">$<?=$d->original_price?></span> <span class="new-price">$<?=$d->price?></span></div>
					<?endif?>
					<div class="buy-now-small"><a href="<?=site_url('deals/view/'.$d->id)?>"><img src="<?=base_url()?>public/img/buy-now-small.png" /></a></div>
					<?
						$daysleft = round((((strtotime($d->end_date)-time())/24)/60)/60);
						$daysleft = ($daysleft>=0?$daysleft.' days remaining':'Sold');
					?>
					<p><?=$daysleft?></p>
				</div>
			<?endif?>
		<?endforeach?>
		<div class="clear"></div>
</div>
<?endif?>