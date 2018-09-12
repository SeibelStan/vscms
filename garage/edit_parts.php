<?php
if(!($_GET['token'] == grg_token) || !isset($_GET['edit']))
	header('Location: index.php');

$parts = json_decode(file_get_contents(sct_blueprints . 'nav.json'));

foreach($parts as $part) {
	if($part->file == $_GET['edit']) {
		$epart = $part;
	}
}
?>

<style>
	textarea {
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		max-width: 1000px;
		width: 100%;
	}
</style>

<script>
	$(function () {
		$('#page-save').click(function () {
			$.post(
				'<?=sct_tools . "for_parts.php?action=part_save&token=" . $_GET['token']?>',
				{
					part: '<?=$epart->file?>',
					data: $('.nicEdit-main').html()
				},
				function () {}
			);
		});
	});
</script>

<div><a href="index.php?adm&token=<?=$_GET['token']?>">Назад</a></div>

<h1>Редактирование страницы &laquo;<?=$epart->title?>&raquo;</h1>

<script src="<?=sct_assets . 'js/nicEdit.js'?>" type="text/javascript"></script>
<script>
	bkLib.onDomLoaded(function() {
		new nicEditor({fullPanel : true}).panelInstance('part-editor');
	});
</script>

<textarea id="part-editor"><?php include(sct_parts . $_GET['edit']) . '.php'?></textarea>
<div>
	<button id="page-save">Сохранить</button>
</div>