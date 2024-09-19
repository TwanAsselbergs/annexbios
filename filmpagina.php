<?php

use function PHPSTORM_META\type;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = htmlspecialchars($_POST['api_id']);

  $api_url = 'https://annexbios.nickvz.nl/api/v1/movieData/' . $id;

  $ch = curl_init($api_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Bearer 8880ea08bcfc00eb4de4aa5994796ef6b2f24c4509506dcf203888de0a947db5'
  ]);

  $response = curl_exec($ch);

  if ($response === false) {
    echo 'Error fetching data from API: ' . curl_error($ch);
    $movieSpecific = [];
  } else {
    $responseDecoded = json_decode($response, true);
    $movieSpecific = $responseDecoded['data'] ?? [];

    if (is_null($movieSpecific)) {
      $movieSpecific = [];
    }
  }

  curl_close($ch);

  $implodedGenreNames = [];
  $implodedActorNames = [];
  $implodeddirectorNames = [];
  $actorImages = [];

  if (isset($movieSpecific[0])) {
    if (isset($movieSpecific[0]['genres'])) {
      foreach ($movieSpecific[0]['genres'] as $genre) {
        $implodedGenreNames[] = $genre['name'];
      }
    }

    if (isset($movieSpecific[0]['actors'])) {
      foreach ($movieSpecific[0]['actors'] as $actor) {
        $implodedActorNames[] = $actor['name'];
        if (count($actorImages) < 3) {
          $actorImages[] = $actor['image'];
        }
      }
    }

    if (isset($movieSpecific[0]['directors'])) {
      foreach ($movieSpecific[0]['directors'] as $director) {
        $implodeddirectorNames[] = $director['name'];
      }
    }
  }
} else {
  echo 'Invalid request method';
  $movieSpecific = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="output.css" />
  <title>AnnexBios - Movie Details</title>
</head>

<body class="font-lato">
  <?php include 'src/root/header.php'; ?>

  <div class="bg-black w-full h-full pt-64 pb-24 md:pt-80 md:pb-56">
    <?php if ($movieSpecific): ?>
      <div class="bg-white text-customBlue mx-4 pb-5 pt-5 md:mx-32 md:pt-10 md:pb-10 text-xl font-bold md:text-6xl pl-3 md:pl-6 rounded">
        <?= htmlspecialchars($movieSpecific[0]['title'] ?? 'N/A') ?>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mx-4 mt-10 md:mx-32">
        <div class="text-black bg-white rounded">
          <img src="<?= $movieSpecific[0]['image'] ?>" alt="Movie Image" class="rounded w-full h-full">
        </div>
        <div class="text-black bg-white w-full rounded p-5">
          <div class="flex flex-row flex-wrap space-x-2">
            <img src="assets/logo/ster.png" alt="" class="w-12 h-12 md:w-20 md:h-20">
            <img src="assets/logo/ster.png" alt="" class="w-12 h-12 md:w-20 md:h-20">
            <img src="assets/logo/ster.png" alt="" class="w-12 h-12 md:w-20 md:h-20">
            <img src="assets/logo/ster.png" alt="" class="w-12 h-12 md:w-20 md:h-20">
            <img src="assets/logo/openster.png" alt="" class="w-12 h-12 md:w-20 md:h-20">
          </div>
          <div class="flex flex-row flex-wrap space-x-3 pt-5">
            <img src="assets/kijkwijzers/kijkwijzer-12.png" alt="" class="w-8 h-8 md:w-10 md:h-10">
            <img src="assets/kijkwijzers/kijkwijzer-eng.png" alt="" class="w-8 h-8 md:w-10 md:h-10">
            <img src="assets/kijkwijzers/kijkwijzer-geweld.png" alt="" class="w-8 h-8 md:w-10 md:h-10">
          </div>
          <h3 class="text-black pt-10 text-lg font-bold md:text-xl">Release: <?= htmlspecialchars($movieSpecific[0]['release_date'] ?? 'N/A') ?></h3>
          <p class="text-black pt-5 font-semibold text-xs md:text-lg">Description:
          <div class="text-black text-xs md:text-lg"><?= htmlspecialchars($movieSpecific[0]['description'] ?? 'N/A') ?></div>
          </p>
          <div class="text-black flex flex-col pt-5 text-xs md:text-sm">
            <p class="text-black pt-4 font-semibold text-xs md:text-lg">Genre:
            <div class="text-black text-xs md:text-base"><?= htmlspecialchars(implode(', ', $implodedGenreNames)) ?></div>
            </p>
            <p class="text-black pt-4 font-semibold text-xs md:text-lg">Filmlengte:
            <div class="text-black text-xs md:text-base"><?= htmlspecialchars($movieSpecific[0]['length'] ?? 'N/A') ?></div>
            </p>
            <p class="text-black pt-4 font-semibold text-xs md:text-lg">Rating:
            <div class="text-black text-xs md:text-base"><?= htmlspecialchars($movieSpecific[0]['rating'] ?? 'N/A') ?></div>
            </p>
            <p class="text-black pt-4 font-semibold text-xs md:text-lg">Regisseur:
            <div class="text-black text-xs md:text-base"><?= htmlspecialchars(implode(', ', $implodeddirectorNames)) ?></div>
            </p>
            <p class="text-black pt-4 font-semibold text-xs md:text-lg">Acteurs:
            <div class="text-black text-xs md:text-base"><?= htmlspecialchars(implode(', ', $implodedActorNames)) ?></div>
            </p>
            <div class="flex flex-row flex-wrap space-x-3 pt-5">
              <?php foreach ($actorImages as $image): ?>
                <img src="<?= htmlspecialchars($image) ?>" alt="Actor Image" class=" w-16 h-32 md:w-32 md:h-48 rounded">
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="md:mx-32">
        <form action="tickets.php" method="POST" style="display: inline;">
          <input type="hidden" name="api_id" value="<?= htmlspecialchars($movieSpecific[0]['api_id'] ?? '') ?>">
          <button type="submit" class="bg-customBlue hover:bg-customBlueLight transition text-white rounded text-center text-lg mt-10 md:text-3xl pt-3 pb-3 md:pt-5 md:pb-5 w-full font-bold">Koop je tickets</button>
        </form>
      </div>
      <div class="bg-white mt-10 mx-4 md:mx-32">
        <iframe class="w-full h-80" src="<?= htmlspecialchars($movieSpecific[0]['embedded_trailer_link'] ?? '') ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    <?php else: ?>
      <p class="text-white text-center text-2xl">Movie not found or error fetching movie details.</p>
    <?php endif; ?>
  </div>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>