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
    $movieAgenda = [];
  } else {
    $responseDecoded = json_decode($response, true);
    $movieAgenda = $responseDecoded['data'] ?? [];

    if (is_null($movieAgenda)) {
      $movieAgenda = [];
    }
  }

  curl_close($ch);

  $implodedGenreNames = [];
  $implodedActorNames = [];
  $implodeddirectorNames = [];

  if (isset($movieAgenda[0])) {
    if (isset($movieAgenda[0]['genres'])) {
      foreach ($movieAgenda[0]['genres'] as $genre) {
        $implodedGenreNames[] = $genre;
      }
    }

    if (isset($movieAgenda[0]['actors'])) {
      foreach ($movieAgenda[0]['actors'] as $actor) {
        $implodedActorNames[] = $actor['name'];
      }
    }

    if (isset($movieAgenda[0]['directors'])) {
      foreach ($movieAgenda[0]['directors'] as $director) {
        $implodeddirectorNames[] = $director['name'];
      }
    }
  }
} else {
  echo 'Invalid request method';
  $movieAgenda = null;
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
  <main class="background-chairs bg-black">
    <section class="md:ml-24 md:mr-24 ml-5 mr-5 md:pt-72 pb-72 md:pb-36 pt-48">
      <h2 class="bg-white p-8 rounded text-customBlue text-3xl md:text-6xl font-bold md:w-1/2">Film Agenda</h2>
      <div class="flex flex-wrap">
        <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12 md:w-28 text-customBlue mr-4 cursor-pointer">
          <input type="checkbox" class="">
          <span class="pl-2">Films</span>
        </label>
        <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12 md:w-36 text-customBlue mr-4 cursor-pointer">
          <input type="checkbox" class="">
          <span class="pl-2">Deze Week</span>
        </label>
        <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12 md:w-36 text-customBlue mr-4 cursor-pointer">
          <input type="checkbox" class="">
          <span class="pl-2">Vandaag</span>
        </label>
        <select class="font-semibold p-4 rounded bg-white text-customBlue cursor-pointer w-5/12 md:w-48 mt-4">
          <option>Categorie</option>
          <option>Actie</option>
          <option>Avontuur</option>
          <option>Familie</option>
        </select>
      </div>
      <div class="overflow-x-auto md:overflow-x-visible">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mt-8">
          <?php if ($movieAgenda): ?>
            <?php foreach ($movieAgenda as $movie): ?>
              <div class="bg-white rounded flex flex-col pb-2 transform transition-transform duration-300 hover:scale-105 hover:-translate-y-2">
                <img src="<?= htmlspecialchars($movie['image']) ?>" alt="Movie" class="w-full h-80 object-cover mb-4">
                <h3 class="text-lg font-bold pl-4"><?= htmlspecialchars($movie['title']) ?></h3>
                <p class="pl-4">Release: <?= htmlspecialchars(date('Y-m-d', strtotime($movie['release_date']))) ?></p>
                <p class="text-sm pt-4 pl-4 line-clamp-3"><?= htmlspecialchars($movie['description']) ?></p>
                <div class="p-4">
                  <form action="filmpagina.php" method="POST" style="display: inline;">
                    <input type="hidden" name="api_id" value="<?= htmlspecialchars($movie['api_id'] ?? '') ?>">
                    <input type="hidden" name="title" value="<?= htmlspecialchars($movie['title'] ?? 'N/A') ?>">
                    <input type="hidden" name="release_date" value="<?= htmlspecialchars(date('Y-m-d', strtotime($movie['release_date'] ?? ''))) ?>">
                    <input type="hidden" name="description" value="<?= htmlspecialchars($movie['description'] ?? 'N/A') ?>">
                    <input type="hidden" name="genres" value="<?= htmlspecialchars(json_encode($movie['genres'] ?? [])) ?>">
                    <input type="hidden" name="length" value="<?= htmlspecialchars($movie['length'] ?? 'N/A') ?>">
                    <input type="hidden" name="image" value="<?= htmlspecialchars($movie['image'] ?? 'assets/films/default.jpg') ?>">
                    <input type="hidden" name="actors" value="<?= htmlspecialchars(json_encode($movie['actors'] ?? [])) ?>">
                    <input type="hidden" name="directors" value="<?= htmlspecialchars(json_encode($movie['directors'] ?? [])) ?>">
                    <input type="hidden" name="rating" value="<?= htmlspecialchars($movie['rating'] ?? 'N/A') ?>">
                    <input type="hidden" name="trailer_link" value="<?= htmlspecialchars($movie['trailer_link'] ?? 'N/A') ?>">
                    <button type="submit" class="w-full text-center p-3 bg-customBlue text-white hover:bg-customBlueLight rounded font-bold">Meer Info & Tickets</button>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-white text-center text-2xl">Movie not found or error fetching movie details.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>