<h1>Latest Posts</h1>
<?if($posts->exists()):?>
	<ul>
	<?foreach($posts->all as $p):?>
		<li><a href="<?=site_url('blogposts/view/'.$p->id)?>"><?=$p->title?></a></li>
	<?endforeach?>
	</ul>
<?else:?>
	<p>No posts to show.</p>
<?endif?>