<?php
/* Template Name: Contact Us */

get_header();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $name = sanitize_text_field( $_POST['name'] );
    $email = sanitize_email( $_POST['email'] );
    $subject = sanitize_text_field( $_POST['subject'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    $to = get_option( 'admin_email' );
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $body = "
        <strong>Name:</strong> {$name}<br>
        <strong>Email:</strong> {$email}<br>
        <strong>Subject:</strong> {$subject}<br>
        <strong>Message:</strong><br>{$message}
    ";

    wp_mail( $to, $subject, $body, $headers );

    echo '<p>Thank you for your message. We will get back to you soon.</p>';
}

?>

<h1>Contact Us</h1>
<form method="post" action="">
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="subject">Subject</label><br>
    <input type="text" id="subject" name="subject" required><br>

    <label for="message">Message</label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br>

    <input type="submit" value="Send">
</form>

<?php
get_footer();
?>
