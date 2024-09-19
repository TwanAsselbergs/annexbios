<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $voornaam = $_POST['firstname'];
  $achternaam = $_POST['lastname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $selected_seats = $_POST['selected_seats'];
  $payment = $_POST['payment'];
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
          <p><strong>Geselecteerde Stoelen:</strong> <?= htmlspecialchars($selected_seats) ?></p>
          <p><strong>Betaalwijze:</strong> <?= htmlspecialchars($payment) ?></p>
        </div>
      </div>
    </section>
  </main>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>