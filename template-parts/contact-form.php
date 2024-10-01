<?php
$language = get_site_language();
$fields = ml_form_fields();
$heading = ml_contact_heading();
$alerts = ml_alerts();
?>

<div class="alert alert--success" style="display: none;">
    <div class="alert-icon"></div>
    <p class="alert-message"><?php echo $alerts["success"][$language]?></p>
</div>
<div class="alert alert--error" style="display: flex;">
    <div class="alert-icon"></div>
    <p class="alert-message"><?php echo $alerts["error"][$language]?></p>
</div>

<div class="contact">
    <div class="contact__decoration"></div>
    <form method="POST" action="" class="form" id="contactForm">
        <h2>
            <?php echo $heading[$language]?>
        </h2>
        <input type="hidden" id="page-title" name="page_title"/>
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
    function showAlert(success) {
        const type = success ? 'success' : 'error';
        const alert = document.querySelector(`.alert--${type}`);
        gsap.to(alert, {
            opacity: 1,
            display: 'flex',
            duration: 0.5,
            y: 200,
            ease: "power2.out"
        })

        setTimeout(() => {
            gsap.to(alert, {
                opacity: 0,
                display: 'none',
                duration: 0.5,
                y: 0,
                ease: "power2.in"
            })
        }, 3000);
    }
    const form = document.getElementById('contactForm');

    document.getElementById("page-title").value = document.title;
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'send_email');

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                const formResponse = document.getElementById('formResponse');
                if(data.success) {
                    form.reset();
                    document.getElementById("page-title").value = document.title;
                }
                showAlert(data.success);
            })
            .catch(error => {
                document.getElementById('formResponse').innerHTML = "<p>Error sending form:" + error +"</p>";
            });
    });

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
