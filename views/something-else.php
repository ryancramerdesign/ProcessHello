<!-- View file for the executeSomethingElse() method in ProcessHello.module.php -->

<h2>Number of pages in your site: <strong><?=$numPages?></strong></h2>
<p>Here are the last 10 created pages:</p>
<p><?= $newPages->implode('<br>', '<a href="{url}">{title|name}</a>') ?></p>
<p><?= __('This is some translatable text.') ?></p>
<p><a href='../'>Go back</a></p>