<?php namespace ProcessWire; 
/** @var string $subhead  */
/** @var array $actions */
?>
<h2><?=$subhead?></h2>
<ul>
	<?php foreach($actions as $url => $label): ?>
		<li><a href='<?=$url?>'><?=$label?></a></li>
	<?php endforeach; ?>
</ul>