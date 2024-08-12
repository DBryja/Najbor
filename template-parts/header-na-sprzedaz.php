<?php
$language = get_site_language();

$heading = '';
switch ($language){
	case "en":
		$heading = "For sale";
		break;
	case "fr":
		$heading = 'à vendre';
		break;
	default:
		$heading = 'Na sprzedaż';
		break;
}

echo "$heading";
?>
