
<!--НАЧАЛО grass-background -->
<div class="grass-background" style="background-image: url(<?=get_field('page_thumbnail')?>)"></div>
<!--КОНЕЦ grass-background -->

<!--НАЧАЛО contacts-->
<div class="contacts container">
	<h2><?=get_the_title()?></h2>
	<div class="row">
		<div class="col-sm-4">
			<p class="address"><?=get_field('address',4)?></p>
			<p class="phone"><a href="tel:<?=get_field('phone1',4)?>"><?=get_field('phone1',4)?></a><br>
				<a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a></p>
			<p class="email"><a href="mailto:<?=get_field('email',4)?>"><?=get_field('email',4)?></a></p>
		</div>
		<div class="col-sm-8 map-container">
			<?=get_field('map',4)?>
		</div>
	</div>
</div>
<!--КОНЕЦ contacts-->

<!--НАЧАЛО feedback -->
<div class="feedback container">
	<h2>Свяжитесь с нами</h2>
	<form class="blink-mailer">
		<input type="hidden" name="title" value="Обратная связь">
		<div class="row">
			<div class="col-sm-4">
				<label for="name">Имя</label>
				<input type="text" required name="Имя" id="name">
				<label for="phone">Телефон</label>
				<input type="tel" required name="Телефон" id="phone">
				<label for="email">E-mail</label>
				<input type="email" required name="E-mail" id="email">
			</div>
			<div class="col-sm-8 pic-col hidden-xs">
				<img src="<?=get_field('page_logo')?>" class="img-responsive">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label for="message">Введите текст сообщения</label>
				<textarea name="Сообщение" required id="message" rows="5"></textarea>
				<input type="submit" value="Отправить">
			</div>
		</div>
	</form>
</div>
<!--КОНЕЦ feedback-->