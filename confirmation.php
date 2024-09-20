<?php
include './db/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['firstname']) && $_POST['firstname'] != '') {
  $voornaam = $_POST['firstname'];
  $achternaam = $_POST['lastname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $selected_seats = explode(',', $_POST['selected_seats']);
  $film = $_POST['movie_name'];
  $datum = date('Y-m-d');

  $sql_klant = $conn->prepare("INSERT INTO klanten (v_naam, a_naam, email, t_nummer) VALUES (?, ?, ?, ?)");
  $sql_klant->bind_param("sssi", $voornaam, $achternaam, $email, $tel);
  $sql_klant->execute();
  $klant_id = $sql_klant->insert_id;
  $sql_klant->close();

  foreach ($selected_seats as $seat) {
    list($seatId, $row, $seatNumber) = explode('-', $seat);
    $sql_reservering = $conn->prepare("INSERT INTO reservering (k_id, z_Nr, s_Nr, film, datum, klant_id) VALUES (?, ?, ?, ?, ?, ?)");
    $sql_reservering->bind_param("iiissi", $klant_id, $row, $seatNumber, $film, $datum, $klant_id);
    $sql_reservering->execute();
    $sql_reservering->close();

    $sql_update_seat = $conn->prepare("UPDATE stoelen SET bezet = 1 WHERE id = ? ");
    $sql_update_seat->bind_param("i", $seatId);
    $sql_update_seat->execute();
    $sql_update_seat->close();
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="output.css" />
  <title>AnnexBios</title>
</head>

<body class="font-lato">
  <?php include 'src/root/header.php'; ?>
  <main>
    <section class="w-full md:pt-36 pb-12 md:pb-36 bg-black flex flex-col items-center justify-center background-chairs">
      <div class="bg-customBlue p-6 md:p-14 rounded w-11/12 md:w-5/6 mt-12 mt-48">
        <h1 class="text-white text-3xl md:text-6xl font-bold">Bedankt voor je bestelling, <?= htmlspecialchars($voornaam) ?>!</h1>
        <p class="text-white mt-6 mb-10">Je tickets zijn naar <?= htmlspecialchars($email) ?> verzonden.</p>
        <div class="bg-white p-6 rounded text-customBlue space-y-2">
          <h2 class="text-2xl font-bold mb-4">Bestelgegevens</h2>
          <p><strong>Naam:</strong> <?= htmlspecialchars($voornaam) ?> <?= htmlspecialchars($achternaam) ?></p>
          <p><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
          <p><strong>Telefoonnummer:</strong> <?= htmlspecialchars($tel) ?></p>
          <p><strong>Geselecteerde Stoelen:</strong> <?= htmlspecialchars(implode(', ', $selected_seats)) ?></p>
          <p><strong>Film:</strong> <?= htmlspecialchars($film) ?></p>
        </div>
      </div>
    </section>
  </main>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>