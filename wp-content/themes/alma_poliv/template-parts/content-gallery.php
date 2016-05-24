
<!--НАЧАЛО gallery-->
<div class="gallery-container container">
	<img src="<?=get_the_post_thumbnail_url()?>" class="img-responsive hood-img">
	<h2><?=get_the_title()?></h2>
	<?php $gal=pp_gallery_get(get_the_ID()); ?>
	<div class="gallery-main-image">
		<img src="<?=$gal[0]->url?>" class="img-responsive">
		<div class="next-prev-arrows">
			<a href="#" class="left-arrow" data-nav="prev">
				<img src="<?php bloginfo('template_directory') ?>/public/img/gallery/carousel-left-arrow.png">
			</a>
			<a href="#" class="right-arrow" data-nav="next">
				<img src="<?php bloginfo('template_directory') ?>/public/img/gallery/carousel-right-arrow.png">
			</a>
		</div>
	</div>

	<div class="owl-carousel">
		<?php foreach ($gal as $value): ?>
		<a href="#" class="thumb" data-img="<?=$value->url?>">
			<img src="<?=$value->url?>">
		</a>
		<?php endforeach; ?>
	</div>
</div>
<!--КОНЕЦ gallery-->