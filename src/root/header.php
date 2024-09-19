<?php

$api_url = 'https://annexbios.nickvz.nl/api/v1/movieData';

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
  $data = [];
} else {
  $data = json_decode($response, true);

  if ($data === null) {
    $data = [];
  }
}

curl_close($ch);

?>

<header class="fixed bg-white w-full z-50">
  <div class="flex flex-col md:flex-row items-center justify-between px-6 md:px-36 py-2 pb-2 md:pb-4">
    <div class="flex items-center space-x-2 flex-shrink-0">
      <a href="index.php">
        <img src="assets/logo/logo.png" alt="Logo" class="h-16 md:h-28 mr-24 md:mr-0">
      </a>
      <button id="burger-menu" class="md:hidden text-gray-700 focus:outline-none ml-4">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    <nav id="nav-links" class="hidden md:flex mt-4 md:mt-0 relative">
      <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 text-lg">
        <li>
          <form action="agenda.php" method="POST">
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
            <button type="submit" data-link="agenda" class=" text-gray-700 hover:text-blue-400 relative font-bold">Film Agenda</button>
          </form>
        </li>
        <li>
          <a href="vestigingen.php" class="nav-link text-gray-700 hover:text-blue-400 relative font-bold" data-link="vestigingen">Alle Vestigingen</a>
        </li>
        <li>
          <a href="contact.php" class="nav-link text-gray-700 hover:text-blue-400 relative pb-24 font-bold" data-link="contact">Contact</a>
        </li>
      </ul>
      <div id="underline" class="absolute bottom-0 h-0.5 rounded-md w-1 bg-blue-400 bg-opacity-75 transition-all duration-300 ease-in-out"></div>
    </nav>
  </div>
  <div class="w-full py-2 md:py-4 bg-customBlue">
    <div class="flex flex-col md:flex-row items-center px-6 md:px-36 py-1">
      <span class="text-white text-lg pr-0 md:pr-10 mb-4 md:mb-0 hidden md:inline font-bold"></span>
      <div class="flex flex-row items-center space-x-6 w-full md:w-auto">
        <select id="movie-select" class="p-2 py-2.5 rounded w-48 md:w-64 bg-customBlueLight text-white font-bold cursor-pointer">
          <option value="">Selecteer een film</option>
          <?php foreach ($data as $movie): ?>
            <option value="<?= htmlspecialchars(json_encode($movie)) ?>"><?= htmlspecialchars($movie['title'] ?? 'N/A') ?></option>
          <?php endforeach; ?>
        </select>
        <form id="movie-form" action="agenda.php" method="POST" onsubmit="return validateForm()">
          <input type="hidden" name="id" id="movie-api_id">
          <button type="submit" class="bg-white hover:bg-gray-100 text-customBlue px-3 py-1 rounded text-sm md:text-base md:w-auto font-bold">Bestel Ticket</button>
        </form>
      </div>
    </div>
  </div>
</header>

<!-- <div id="no-movie-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg p-6 w-80 max-w-full text-center">
    <span class="text-gray-700 text-xl font-bold mb-4 block">Geen film geselecteerd.</span>
    <button class="bg-customBlue hover:bg-customBlueLight text-white font-bold py-2 px-4 rounded" onclick="closeModal()">Sluiten</button>
  </div>
</div> -->

<div id="side-menu" class="fixed top-0 right-0 w-64 h-full bg-customBlue transform translate-x-full transition-transform duration-300 ease-in-out z-50">
  <ul class="flex flex-col space-y-2 p-4 text-white">
    <li>
      <form id="movie-form" action="agenda.php" method="POST">
        <input type="hidden" name="id" id="movie-api_id">
        <input type="hidden" name="title" id="movie-title">
        <input type="hidden" name="release_date" id="movie-release-date">
        <input type="hidden" name="description" id="movie-description">
        <input type="hidden" name="genre" id="movie-genres">
        <input type="hidden" name="duration" id="movie-length">
        <input type="hidden" name="images" id="movie-image">
        <input type="hidden" name="actors" id="movie-actors">
        <input type="hidden" name="director" id="movie-director">
        <input type="hidden" name="imdb_score" id="movie-rating">
        <input type="hidden" name="trailer_url" id="movie-trailer-link">
        <button type="submit" class="flex items-center p-2 text-lg rounded font-bold">
          <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
          Film agenda
        </button>
      </form>
    </li>
    <li>
      <a href="vestigingen.php" class="flex items-center p-2 text-lg rounded font-bold">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
        Alle Vestigingen
      </a>
    </li>
    <li>
      <a href="contact.php" class="flex items-center p-2 text-lg rounded font-bold">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
        Contact
      </a>
    </li>
  </ul>
</div>

<div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden"></div>

<script src="js/script.js"></script>