<main>
	<?php

	if(isset($_GET['adm'])) {
		$part_path = sct_garage . $_GET['part'] . '.php';
		if(file_exists($part_path)) {
			include_once($part_path);
		}
		else {
			include_once(sct_garage . 'home.php');
		}
	}
	else {
		if(isset($_GET['part'])) {
			$part_path = sct_parts . $_GET['part'] . '.php';
			if(file_exists($part_path)) {
				include_once($part_path);
			}
			else {
				include_once(sct_parts . 'home.php');
			}
		}
		else {
			include_once(sct_parts . 'home.php');
		}
	}
	?>
</main>