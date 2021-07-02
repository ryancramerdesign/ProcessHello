<?php namespace ProcessWire;
/** @var string $subhead */
/** @var PageArray $newPages */
?>
<h2><?=$subhead?></h2>
<ul>
	<?=$newPages->each("<li><a href='{url}'>{title|name}</a></li>")?>
</ul>
