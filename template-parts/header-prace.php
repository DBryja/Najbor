<?php
$language = get_site_language();

$heading = '';
switch ($language){
	case "en":
		$heading = "Works";
		break;
	case "fr":
		$heading = 'Travaux';
		break;
	default:
		$heading = 'Prace';
		break;
}

echo $heading;
?>
