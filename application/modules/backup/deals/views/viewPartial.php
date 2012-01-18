<div id="todays-deal">
	<h2><?=$header?></h2>
	<div id="deal-image">
		<img src="<?=getThumb($deal->photo->get()->url,'280')?>" />
		<div id="deal-share">
			<span  class='st_fblike_hcount' ></span>
			<span  class='st_plusone_hcount' ></span>
			<span  class='st_twitter_hcount' displayText='Tweet'></span><br /><br />
			<span  class='st_linkedin_hcount' displayText='LinkedIn'></span>
			<span  class='st_stumbleupon_hcount' displayText='StumbleUpon'></span>
		</div>
		<?if($deal->video):?>
		<div style="margin-bottom:20px">
			<?=getYoutubeVideo($deal->video)?>
		</div>
		<?endif?>
	</div>
	
	<div id="deal-details">
		<h4><?=$deal->company_name?></h4>
		<h3><?=$deal->title?></h3>

		<?if($deal->price && $deal->original_price && $deal->paypal):?>
		<div class="deal-price">$<?=number_format($deal->price,0,'.',' ')?></div>
		<div class="buy-now" style="float:right">
			<?=$deal->paypal?>
		</div>
		<div class="clear"></div>
		
		<ul id="deal-stats">
			<li><?=round(($deal->original_price - $deal->price)/$deal->original_price * 100)?>%</li>
			<li>$<?=number_format($deal->original_price,0,'.',' ')?></li>
			<?
				$daysleft = round((((strtotime($deal->end_date)-time())/24)/60)/60);
				$daysleft = ($daysleft>=0?$daysleft.' days':'Sold');
			?>
			<li><?=$daysleft?></li>
		</ul>
		
		<ul id="deal-stats-label">
			<li>Savings</li>
			<li>Reg. Price</li>
			<li><?=($daysleft>=0?'Remaining':'')?></li>
		</ul>
		<?endif?>
		<div id="deal-description">
			<?if($this->input->get('expanded')):?>
				<p><?=html_entity_decode(str_replace("&nbsp;", "<br/>", $deal->description))?></p>
			<?else:?>
				<p><?=nl2br($deal->short_description)?> <a href="<?=site_url($this->uri->uri_string()).'?expanded=1'?>">Show More</a></p>
			<?endif?>
		</div>
		
		<?if($deal->fine_print):?>
		<div id="fine-print">
			<a href="#facebox_content" rel="facebox" id="fineprint">Click here for the fine print on the deal</a>	
			<div id="facebox_content" style="display: none">
				<h3>Fine Print</h3>
				<p><?=nl2br($deal->fine_print)?></p>
			</div>
		</div>
		<?endif?>
		
		<?if($deal->address):?>
			<div id="location"><?=$deal->address?><br /><?=$deal->phone?> | <a target="_blank" href="http://maps.google.com/maps?q=<?=urlencode(strip_tags($deal->address))?>">Map and Directions</a></div>
		<?endif?>
		<?/*?><div id="see-more"><a href="#">See more Technology deals</a></div>*/?>
		
	</div><!-- /deal-details -->
	
	<div class="clear"></div>
</div><!-- /todays-deal -->