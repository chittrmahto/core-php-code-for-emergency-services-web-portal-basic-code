<?php
require_once "Mail.php";
$from = "Chirag <chiragapna@gmail.com>";
$to = "Chitt Ranjan <chittrmahto@gmail.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";
$host = "mail.technsl.in";
$username = "noreply@technsl.in";
$password = "2g8c2Mt1Bh";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>