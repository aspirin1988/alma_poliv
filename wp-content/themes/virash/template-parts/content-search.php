<div class="article-item col-md-12 col-sm-12">
	<h2  ><a href="<?=get_permalink()?>"><?=get_the_title()?></a></h2>
	<p class="article-date"><?=get_the_date()?></p>
	<p class="article-fragment"><?=mb_substr(strip_tags(get_the_content()),0,128)?></p>
	<a href="<?=get_permalink()?>" class="btn" type="button" name="button">Читать далее</a>
</div>