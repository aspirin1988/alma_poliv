<!--НАЧАЛО big-pic -->
<div class="big-pic container">
	<img src="<?=get_the_post_thumbnail_url()?>" class="img-responsive">
</div>
<!--КОНЕЦ big-pic -->

<!--НАЧАЛО portfolio -->
<div class="portfolio container">
	<h2><?=get_the_title()?></h2>
	<div class="row">
		<div class="col-sm-3">
			<?php $active='active'; for($i=1; $i<=10; $i++ ): if($video=get_field('video-'.$i)):?>
			<a href="#" class="videoThumb <?=$active?>" data-src="<?=$video?>">
				<p class="hidden-lg hidden-md hidden-sm">Hunter</p>
				<img src="<?=get_field('video-thumbnail-'.$i)?>" class="img-responsive hidden-xs">
			</a>
			<?php $active=''; endif; endfor; ?>
		</div>
		<div class="col-sm-9">
			<div class='embed-container'>
				<iframe src='<?=get_field('video-1')?>' frameborder='0' allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<!--КОНЕЦ portfolio -->