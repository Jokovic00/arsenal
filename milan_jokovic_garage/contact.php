<?php
    include('partials/header.php');
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Template - Contact Page</title>
    <link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="style/slider.css">
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" type="text/css" href="style/contactstyle.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="contact-form">
                <h2 class="text-center">Contact Us</h2>
                <form id="contact-form" action="contact_.php" method="post" role="form">
                    <h6 class="text-success" id="success-message" style="display:none;">Your message has been sent successfully.</h6>
                    <h6 class="text-danger" id="error-message" style="display:none;">E-mail must be valid and message must be longer than 1 character.</h6>
                    <div class="form-group">
                        <label for="cf-name">Name</label>
                        <input type="text" class="form-control" id="cf-name" name="cf-name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="cf-email">Email Address</label>
                        <input type="email" class="form-control" id="cf-email" name="cf-email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="cf-subject">Subject</label>
                        <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <label for="cf-message">Message</label>
                        <textarea class="form-control" rows="5" id="cf-message" name="cf-message" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="text-center">
                        <div class="section-btn">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
