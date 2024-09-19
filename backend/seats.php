<?php
include './db/db_connect.php';
// session_start();

$stmt = $conn->prepare("SELECT * FROM stoelen");

$stmt->execute();
$result = $stmt->get_result();
$counter = 0;
$rowstoelen = 0;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $seatId = "seat-" . $row['id'];

    //in_array($row['id'], $_SESSION['selected_seats'] ?? []) ? 'selected' :
    $selected =  in_array($row['id'], is_array($_SESSION['selected_seats']) ? $_SESSION['selected_seats'] : []) ? 'selected' : '';
    $taken = $row['taken'] ? 'taken' : '';

    $imageSrc = ($row["rij"] == 1 && ($row["stoel_Nr"] == 1 || $row["stoel_Nr"] == 2)) ? './assets/zalen/seat_invalide.png' : './assets/zalen/seat.png';
    if ($row['taken']) {
      $imageSrc = './assets/zalen/seat_selected.png';
    }

    $onclick = $row['taken'] ? '' : 'onclick="selectSeat(this)" style="cursor: pointer;"';

    if ($rowstoelen == 0) {
      echo '<div id="' . $seatId . '" class="col-span-1 rounded text-center seat ' . $selected . ' ' . $taken . '" data-seat-id="' . $row['id'] . '" data-row="' . $row["rij"] . '" data-seat-number="' . $row["stoel_Nr"] . '" data-film="jurassic world" ' . $onclick . '>';
      echo '<img src="' . $imageSrc . '" alt="Seat ' . $row["stoel_Nr"] . '" class="' . ($row['taken'] ? 'cursor-not-allowed' : '') . '">';
      echo '</div>';
    } else {
      if ($counter == 11) {
        $counter = 0;
        echo '<div class="col-span-1 bg-white rounded text-center">';
        echo '</div>';

        echo '<div id="' . $seatId . '" class="col-span-1 rounded text-center seat ' . $selected . ' ' . $taken . '" data-seat-id="' . $row['id'] . '" data-row="' . $row["rij"] . '" data-seat-number="' . $row["stoel_Nr"] . '" ' . $onclick . '>';
        echo '<img src="' . $imageSrc . '" alt="Seat ' . $row["stoel_Nr"] . '" class="' . ($row['taken'] ? 'cursor-not-allowed' : '') . '">';
        echo '</div>';
      } else {
        echo '<div id="' . $seatId . '" class="col-span-1 rounded text-center seat ' . $selected . ' ' . $taken . '" data-seat-id="' . $row['id'] . '" data-row="' . $row["rij"] . '" data-seat-number="' . $row["stoel_Nr"] . '" ' . $onclick . '>';
        echo '<img src="' . $imageSrc . '" alt="Seat ' . $row["stoel_Nr"] . '" class="' . ($row['taken'] ? 'cursor-not-allowed' : '') . '">';
        echo '</div>';
      }
    }

    $counter++;
    if ($counter == 12) {
      if ($rowstoelen == 0) {
        $counter = 0;
      }
      $rowstoelen = 1;
    }
  }
} else {
  echo "Error.";
}

$stmt->close();
$conn->close();
