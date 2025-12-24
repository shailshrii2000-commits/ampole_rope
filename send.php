<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // YOUR EMAIL (where enquiry will come)
    $to = "ampolerope@gmail.com";

    // GET FORM DATA (safe)
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $mobile  = htmlspecialchars($_POST['mobile']);
    $message = htmlspecialchars($_POST['message']);

    // SUBJECT
    $subject = "New Enquiry - AMPOLE Rope";

    // EMAIL BODY
    $body = "
New Enquiry Received:

Name: $name
Email: $email
Mobile: $mobile

Message:
$message
    ";

    // HEADERS
    $headers  = "From: AMPOLE Rope <no-reply@ampolerope.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // SEND MAIL
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('Thank you! Your enquiry has been sent.');
                window.location.href='index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error! Please try again later.');
                window.history.back();
              </script>";
    }
}
?>
