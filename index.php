<?php
	$config=require(dirname(__FILE__).'/config.php');
	require(dirname(__FILE__).'/router.php');
	$router = new Routing( $_SERVER );
?>
<!DOCTYPE html >
<html xml:lang="ru-RU" lang="ru-RU" >
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=$config['sitePath']?>css/ui.css" />
	<title><?=$config['title']?></title>
</head><body>
	<div class="wrapper">
		<div class="inner">
			<h1><a href="/"><?=$config['title']?></a></h1>
			<div class="content">
				<?php require_once $router->page; ?>
			</div>
			<div class="push"></div>
			<div class="clr"></div>
		</div>
	</div>
	<div class="footer">
		<div class="inner">
			© Copyright <?=$config['title']?> <?=date('Y')?>
		</div>
	</div>
</body></html>