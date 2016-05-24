<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php $current_object=get_queried_object(); $field=get_option($current_object->taxonomy.'_'.$current_object->term_taxonomy_id) ?>
	<title>Алма-полив |
		<?php
		if (is_tax()||is_category()){
			$_title=$field['meta-title'];
			if ($_title){
				echo $_title;
			} else{
				if (get_field('meta-title')){
					the_field('meta-title');
				}else{
					the_title();}
			}
		}else{
			if (get_field('meta-title')){
				the_field('meta-title');
			}else{
				the_title();}
		}?>
	</title>
	<meta name="description" content="<?php if (is_tax()){
		echo $field['meta-description'];
	}else{
		the_field('meta-description');
	}?>"/>
	<link rel="shortcut icon" href="<?=get_field('favicon',4)?>">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="<?php bloginfo('template_directory') ?>/public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/styles.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<header>
	<div class="header__top-zip-line"></div>
	<div class="header__content container">
		<a href="/" class="logo">
			<img src="<?=get_field('logo',4)?>" alt="Лого" class="img-responsive">
			<p class="logo__description">
				<?=get_field('logo_description',4)?>
			</p>
		</a>
		<div class="navbar-and-phone-numbers">
			<p class="phone-numbers">
				<a href="tel:<?=get_field('phone1',4)?>"><?=get_field('phone1',4)?></a> <span class="hidden-xs">|</span>
				<a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a>
			</p>
			<nav class="navbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php $menu=wp_get_nav_menu_items('main'); $title=get_post();/* print_r($menu);*/
						foreach ($menu as $key=>$val) {
						if (!$val->menu_item_parent){ $class='';  $title=get_post();
						if(($current_object->ID==$val->object_id)||($current_object->term_id==$val->object_id)){$class='active';} ?>
						<li class="<?php echo $class;?>"><a href="<?=$val->url?>"><?=$val->title?></a>
						<?php }} ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<div class="header__bottom-line hidden-xs"></div>
</header>