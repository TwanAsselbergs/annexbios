<?php
session_start();
include('../db/db_connect.php');
if (isset($_POST['seats'])) {
  $seats = json_decode($_POST['seats'], true);
  $_SESSION['selected_seats'] = $seats;
  echo "Seats updated successfully.";
} else {
  echo "No seats provided.";
}
