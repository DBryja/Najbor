<?php
$language = get_site_language();
$fields = array(
	'name' => array("pl"=>"Imię", "en"=>"Name", "fr"=>"Nom"),
	'email' => array("pl"=>"Email", "en"=>"Email", "fr"=>"Email"),
	'subject' => array("pl"=>"Temat", "en"=>"Subject", "fr"=>"Sujet"),
	'message' => array("pl"=>"Wiadomość", "en"=>"Message", "fr"=>"Message")
);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$name = sanitize_text_field( $_POST['name'] );
	$email = sanitize_email( $_POST['email'] );
	$subject = sanitize_text_field( $_POST['subject'] );
	$message = sanitize_textarea_field( $_POST['message'] );

	$to = get_option( 'admin_email' );
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$body = "
        <strong>Message:</strong><br>{$message}
    ";

	wp_mail( $to, $subject, $body, $headers );

	echo '<p>Thank you for your message. We will get back to you soon.</p>';
}
?>

<div class="contact">
    <div class="contact__decoration"></div>
    <form method="post" action="" class="form">
        <h2>
            Zamówienia, Zlecenia, Zapytania
        </h2>
        <div class="form-field form-field__wrapper">
            <label class="form-field__label" for="name"><?php echo $fields["name"][$language]?></label><br>
			<input class="form-field__input" type="text" id="name" name="name" required><br>
		</div>
		<div class="form-field form-field__wrapper">
			<label class="form-field__label" for="email"><?php echo $fields["email"][$language]?></label><br>
			<input class="form-field__input" type="email" id="email" name="email" required><br>
		</div>
		<div class="form-field form-field__wrapper">
			<label class="form-field__label" for="subject"><?php echo $fields["subject"][$language]?></label><br>
			<input class="form-field__input" type="text" id="subject" name="subject" required><br>
		</div>
		<div class="form-field form-field__wrapper">
			<label class="form-field__label" for="message"><?php echo $fields["message"][$language]?></label><br>
			<textarea class="form-field__input form-field__input--textarea" id="message" name="message" rows="5" required></textarea><br>
		</div>
		<button type="submit" class="form-field__submit cursor--click">
            <span class="arrow"></span>
		</button>
	</form>
</div>
<script>
    const fields = document.querySelectorAll(".form-field__input");
    fields.forEach((field)=>{
        if (field.value.trim() !== "") {
            field.classList.add("filled");
        } else {
            field.classList.remove("filled");
        }

        field.addEventListener("input", () => {
            if (field.value.trim() !== "") {
                field.classList.add("filled");
            } else {
                field.classList.remove("filled");
            }
        });
    })
</script>
