<?php

require_once('../config.php');

$_POST['part'] = preg_replace("/\.\.\//", '', $_POST['part']);

if ($_GET['token'] == grg_token) {

	switch ($_GET['action']) {
		case 'part_save':
		{
			if(isset($_POST['part'])) {
				$part = '../' . sct_parts . $_POST['part'] . '.php';
				if (file_exists($part)) {
					file_put_contents($part, $_POST['data']);
				}
			}
			break;
		}
		case 'part_remove': {
			if(isset($_POST['part'])) {
				$part = '../' . sct_parts . $_POST['part'] . '.php';
				unlink($part);

				$parts = json_decode(file_get_contents('../' . sct_blueprints . 'nav.json'));
				$newparts = array();
				foreach($parts as $spart) {
					if(!($spart->file == $_POST['part'])) {
						array_push($newparts, $spart);
					}
				}
				file_put_contents('../' . sct_blueprints . 'nav.json', json_encode($newparts));
			}
			break;
		}
		case 'part_create': {
			if(isset($_POST['part'])) {
				$part = '../' . sct_parts . $_POST['part'] . '.php';
				fopen($part, "w");
				chmod($part, 0777);

				$parts = json_decode(file_get_contents('../' . sct_blueprints . 'nav.json'));
				$newpart = array(
					"title" => $_POST['part'],
					"file" => $_POST['part']
				);
				array_push($parts, $newpart);
				file_put_contents('../' . sct_blueprints . 'nav.json', json_encode($parts));
			}
			break;
		}
		case 'part_rename': {
			if(isset($_POST['part'])) {
				$parts = json_decode(file_get_contents('../' . sct_blueprints . 'nav.json'));
				$i = 0;
				foreach($parts as $spart) {
					if($spart->file == $_POST['part']) {
						$parts[$i]->title = $_POST['title'];
					}
					$i++;
				}
				file_put_contents('../' . sct_blueprints . 'nav.json', json_encode($parts));
			}
			break;
		}
	}

}