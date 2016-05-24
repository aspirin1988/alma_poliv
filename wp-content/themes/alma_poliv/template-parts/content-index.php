<!--НАЧАЛО main section-->
<div class="main-section" style="background-image: url(<?=get_field('page_thumbnail')?>)" >
	<div class="container">
		<img src="<?=get_field('page_logo')?>" alt="Hunter лого" class="img-responsive">
		<p>
			<?=get_field('page_description')?>
		</p>
	</div>
</div>
<!--КОНЕЦ main section-->

<!--НАЧАЛО about on main page-->
<div class="about-on-main">
	<h2>О нас</h2>
	<div class="container">
		<div class="advantages-container">
		<?php $menu=wp_get_nav_menu_items('about'); /*print_r($menu);*/
			foreach ($menu as $key=>$val) : ?>
				<div>
					<img src="<?=wp_get_attachment_thumb_url($val->thumbnail_id);?>" class="img-responsive">
					<p><?=$val->post_title?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row about-on-main__summary">
			<div class="col-sm-4">
				<img src="<?=get_the_post_thumbnail_url()?>" class="img-responsive">
			</div>
			<div class="col-sm-8">
				<p>
					<?=get_the_content()?>
				</p>
			</div>
		</div>
	</div>
</div>
<!--КОНЕЦ about on main page-->

<!--НАЧАЛО services on main page-->
<div class="services-on-main">
	<div class="container">
		<h2>Наши услуги</h2>
		<div class="advantages-container">
			<?php
			$args = array( 'category_name'=> 'services' ,'numberposts'=>5 , 'order'=>'ASC' );
			$categories=get_posts($args );
			foreach ($categories as $value): ?>
			<a href="/category/services/#<?=$value->ID?>">
				<img src="<?=get_the_post_thumbnail_url($value->ID)?>" class="img-responsive">
				<p><?=$value->post_title?></p>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!--КОНЕЦ services on main page-->

<!--НАЧАЛО gallery on main-->
<div class="gallery-on-main container">
	<?php $get_post=get_post(18);
	?>
	<h2><?=$get_post->post_title?></h2>

	<img src="<?=get_the_post_thumbnail_url($get_post->ID)?>" class="img-responsive hood-img">

	<!-- по нажатию на data-imagelightbox="f" открывается lighbBox:-->
	<div class="row">
		<?php $gal=pp_gallery_get(18);
		$count=0;
		foreach ($gal as $value): $count++; if ($count>4){break;}
		?>
		<div class="col-md-3 col-sm-6 gallery-item">
			<a href="<?=$value->url?>" data-imagelightbox="f">
				<img src="<?=$value->url?>" class="img-responsive">
			</a>
		</div>
		<?php endforeach; ?>
	</div>

	<a href="<?=get_permalink(18)?>" class="btn">Перейти в галерею</a>
</div>
<!--КОНЕЦ gallery on main-->

<!--НАЧАЛО portfolio on main-->
<div class="portfolio-on-main container">
	<h2>Наши работы</h2>
	<div class="row">
		<?php for($i=1; $i<=2; $i++ ): if($video=get_field('video-'.$i,15)):?>
		<div class="col-sm-6 portfolio-item">
			<div class='embed-container'>
				<iframe src='<?=$video?>' frameborder='0' allowfullscreen></iframe>

			</div>
		</div>
		<?php endif; endfor; ?>
	</div>
	<a href="<?=get_permalink(15)?>" class="btn">Смотреть все видео</a>
</div>
<!--КОНЕЦ portfolio on main-->