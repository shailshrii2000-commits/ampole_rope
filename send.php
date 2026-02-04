<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$mobile  = trim($_POST['mobile'] ?? '');
$message = trim($_POST['message'] ?? '');

$to = "info@ampolerope.com";
$subject = "New Enquiry - AMPOLE Rope";

$body = "New Enquiry\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Mobile: $mobile\n\n";
$body .= "Message:\n$message";

$headers  = "From: AMPOLE Rope <no-reply@".$_SERVER['SERVER_NAME'].">\r\n";
$headers .= "Reply-To: $email\r\n";

@mail($to, $subject, $body, $headers);

echo "<script>
alert('Thank you! Your enquiry has been sent.');
window.location.href='index.html';
</script>";
