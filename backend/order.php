<?php
session_start();
include '../db/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $voornaam = $_POST['firstname'];
  $achternaam = $_POST['lastname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $selected_seats = explode(',', $_POST['selected_seats']);
  $film = "Jurassic World";
  $datum = date('Y-m-d');

  $sql_klant = $conn->prepare("INSERT INTO klanten (v_naam, a_naam, email, t_nummer) VALUES (?, ?, ?, ?)");
  $sql_klant->bind_param("sssi", $voornaam, $achternaam, $email, $tel);
  $sql_klant->execute();
  $klant_id = $sql_klant->insert_id;
  $sql_klant->close();

  foreach ($selected_seats as $seat) {
    $sql_reservering = $conn->prepare("INSERT INTO reservering (k_id, z_Nr, s_Nr, film, datum, klant_id) VALUES (?, ?, ?, ?, ?, ?)");
    $z_Nr = 1;
    $sql_reservering->bind_param("iiissi", $z_Nr, $seat, $seat, $film, $datum, $klant_id);
    $sql_reservering->execute();
    $sql_reservering->close();
    $sql_update_seat = $conn->prepare("UPDATE stoelen SET taken = 1 WHERE id = ?");
    $sql_update_seat->bind_param("i", $seat);
    $sql_update_seat->execute();
    $sql_update_seat->close();
  }

  $conn->close();
  header("Location: ../tickets.php");
  exit();
}