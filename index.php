<?php require_once('config.php');?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?=sct_assets?>css/core.css"/>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="<?=sct_assets?>js/core.js"></script>
</head>
<body>
<div id="content">
<?php
include_once(shl_header);
include_once(shl_nav);
include_once(shl_part);
echo '</div>';
include_once(shl_footer);
?>
</body>
</html>