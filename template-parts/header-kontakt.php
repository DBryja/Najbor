<?php
$language = get_site_language();

$heading = '';
switch ($language){
	case "en":
	case "fr":
		$heading = 'Contact';
		break;
	default:
		$heading = 'Kontakt';
		break;
}

echo "$heading";
?>


