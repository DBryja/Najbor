<?php
// ARCHIVE
function ml_single_labels(){
	return array(
		'metoda' => array(
			'pl' => 'Metoda',
			'en' => 'Method',
			'fr' => 'Méthode'
		),
		'wymiary' => array(
			'pl' => 'Wymiary',
			'en' => 'Dimensions',
			'fr' => 'Dimensions'
		),
		'oprawa' => array(
			'pl' => 'Oprawa',
			'en' => 'Framing',
			'fr' => 'Encadrement'
		),
		'rok_powstania' => array(
			'pl' => 'Rok powstania',
			'en' => 'Year of creation',
			'fr' => 'Année de création'
		),
		"na_sprzedaz" => array(
			"pl" => "Dostępność",
			"en" => "Availability",
			"fr" => "Disponibilité"
		)
	);
}
function ml_languages(){
	return array('pl', 'en', 'fr');
}

// ARCHIVE / SINGLE
function ml_for_sale(){
	return array(
		'pl' => 'Na sprzedaż',
		'en' => 'For sale',
		'fr' => 'À vendre'
	);
}

// CONTACT FORM
function ml_form_fields(){
	return array(
		'name' => array("pl"=>"Imię", "en"=>"Name", "fr"=>"Nom"),
		'email' => array("pl"=>"Email", "en"=>"Email", "fr"=>"Email"),
		'subject' => array("pl"=>"Temat", "en"=>"Subject", "fr"=>"Sujet"),
		'message' => array("pl"=>"Wiadomość", "en"=>"Message", "fr"=>"Message")
	);
}
function ml_contact_heading(){
	return array(
		"pl" => "Zamówienia, Zlecenia, Zapytania",
		"en" => "Orders, Offers, Inquiries",
		"fr" => "Commandes, Contrats, Consultations"
	);
}

// Copyrights
function ml_realisation(){
	return array("pl" => "Realizacja", "fr" => "Réalisation", "en" => "Realisation");
}


?>

