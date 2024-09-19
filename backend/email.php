<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $voornaam = $_POST['firstname'];
  $achternaam = $_POST['lastname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $selected_seats = $_POST['selected_seats'];
  $payment = $_POST['payment'];

  $to = $email;
  $subject = "New Ticket Order";
  $message = "
    Voornaam: $voornaam\n
    Achternaam: $achternaam\n
    Email: $email\n
    Telefoonnummer: $tel\n
    Geselecteerde Stoelen: $selected_seats\n
    Betaalwijze: $payment\n
    ";

  $headers = "From: contact@annexbios.nl";

  if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
  } else {
    echo "Failed to send email.";
    error_log("Email failed to send to $to");
  }
} else {
  echo "Invalid request method.";
}
