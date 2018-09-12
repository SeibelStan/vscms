<?php
	if(!($_GET['token'] == grg_token))
		header('Location: index.php');
?>

<script>
	$(function () {
		// Удаление страницы
		$('.btn-part-remove').click(function () {
			$.post(
				'<?=sct_tools?>for_parts.php?action=part_remove&token=<?=$_GET['token']?>',
				{
					part: $(this).attr('data-id')
				},
				function () {
					location.reload();
				}
			);
		});

		// Переход к редактированию страницы
		$('.btn-part-edit').click(function () {
			location.replace('index.php?adm&part=edit_parts&edit=' + $(this).attr('data-id') + '&token=<?=$_GET['token']?>');
		});

		// Перименование страницы
		$('.inp-part-title').keyup(function () {
			$.post(
				'<?=sct_tools?>for_parts.php?action=part_rename&token=<?=$_GET['token']?>',
				{
					part: $(this).attr('data-id'),
					title: $(this).val()
				},
				function () {}
			);	
		});

		$('#part-create').click(function () {
			$.post(
				'<?=sct_tools?>for_parts.php?action=part_create&token=<?=$_GET['token']?>',
				{
					part: $('#inp-new-part-title').val()
				},
				function () {
					location.reload();
				}
			);
		});
	});
</script>

<h1>Гараж</h1>

<h2>Изменение страниц</h2>
<ul>
	<?php
	$parts = json_decode(file_get_contents(sct_blueprints . 'nav.json'));

	foreach ($parts as $part) {
		echo '
		<li><input type="text" class="inp-part-title" data-id="' . $part->file  . '" value="' . $part->title . '">
		<button class="btn-part-edit" data-id="' . $part->file  . '" title="К редактированию">✎</button>
		<button class="btn-part-remove" data-id="' . $part->file . '" title="Удалить">✘</button>
		';
	}
	?>
	<li>
		<input type="text" id="inp-new-part-title">
		<button id="part-create" title="Создать страницу">✚</button>
</ul>