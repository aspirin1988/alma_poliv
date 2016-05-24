<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo">
					<img src="<?=get_field('logo',4)?>" alt="Лого" class="img-responsive">
					<p class="logo__description">
						<?=get_field('logo_description',4)?>
					</p>
				</div>
				<p>
					НАШИ КОНТАКТЫ <br>
					<span><?=get_field('address',4)?></span><br>
					<br>
					<a href="tel:<?=get_field('phone1',4)?>"><?=get_field('phone1',4)?></a><br>
					<a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a><br>
					<br>
					<a href="mailto:<?=get_field('address',4)?>"><?=get_field('address',4)?></a>
				</p>
			</div>
			<div class="col-sm-8 map-container hidden-xs">
				<?=get_field('map',4)?>
			</div>
		</div>
	</div>
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php bloginfo('template_directory') ?>/public/js/jquery-2.2.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory') ?>/public/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/imagelightbox.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/scripts.js"></script>
<script src="https://callback.blink.kz/resources/callback/js/mailer.js"></script>
<script>
	var submitSMG = new BMModule();
	submitSMG.submitForm(function(success) { $('.blink-mailer input[type=submit]').val('Отправить'); $('form.blink-mailer').html('<div class="row"><div class="col-sm-4 text-center">'+success+'</div><div class="col-sm-8 pic-col hidden-xs"><img src="<?=get_field('page_logo')?>" class="img-responsive"></div></div>');}, function(error) {});
</script>
<?=get_field('google')?>
<?=get_field('yandex')?>
</body>
</html>