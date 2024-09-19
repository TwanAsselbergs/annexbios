<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./output.css" />
  <title>AnnexBios</title>
</head>

<body class="font-lato">
  <?php include 'src/root/header.php'; ?>
  <main>
    <section class="w-full md:pt-36 pb-12 md:pb-36 bg-black flex flex-col items-center justify-center background-chairs">
      <div class="bg-customBlue p-6 md:p-14 rounded w-11/12 md:w-5/6 mt-48">
        <h1 class="text-white text-3xl md:text-6xl font-bold">Welkom bij AnnexBios Montfoort</h1>
        <p class="text-white mt-6 mb-12">Welkom bij AnnexBios Montfoort, waar filmervaringen tot leven komen. Geniet van de nieuwste films in een comfortabele en moderne omgeving.</p>
        <a href="agenda.php" class="p-3 w-48 md:w-24 text-center bg-white text-customBlue hover:bg-gray-100 rounded font-bold">
          Bekijk Draaiende Films
        </a>
      </div>
      <div class="bg-white p-8 rounded w-11/12 md:w-5/6 mt-12 flex flex-col-reverse md:flex-row">
        <div class="bg-customBlue w-full md:w-1/2 rounded text-white">
          <img src="assets/maps/maps.png" alt="Maps" class="w-full rounded">
          <p class="pt-6 pl-6 hover:underline cursor-pointer"><a href="contact.php">Rijksstraatweg 42</a></p>
          <p class="pl-6">3223 KA Hellevoetsluis</p>
          <p class="pt-4 pl-6 hover:underline cursor-pointer"><a href="tel:02012345678">020-12345678</a></p>
          <p class="font-bold pt-4 text-lg pl-6 pb-4">Bereikbaarheid</p>
          <p class="pb-4 md:pb-0 pl-6 pr-2 md:pr-0">Onze bioscoop is gemakkelijk bereikbaar met zowel het openbaar vervoer als met de auto. Er is voldoende parkeergelegenheid in de buurt.</p>
        </div>
        <img src="assets/maps/tivoli.png" alt="Tivoli" class="rounded  md:w-1/2 mb-8 md:mb-0 md:ml-12">
      </div>
      <div class="w-11/12 md:w-5/6 mt-36 relative">
        <h2 class="bg-white p-8 rounded text-customBlue text-3xl md:text-6xl font-bold md:w-1/2 ">Film Agenda</h2>
        <div class="flex flex-col md:flex-row">
          <div class="flex flex-wrap">
            <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12 md:w-28 text-customBlue mr-4 cursor-pointer">
              <input type="checkbox" class="">
              <span class="pl-2">Films</span>
            </label>
            <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12  md:w-36 text-customBlue mr-4 cursor-pointer">
              <input type="checkbox" class="">
              <span class="pl-2">Deze Week</span>
            </label>
            <label class="font-semibold bg-white p-4 rounded items-center mt-4 w-5/12 md:w-36 text-customBlue mr-4 cursor-pointer">
              <input type="checkbox" class="">
              <span class="pl-2">Vandaag</span>
            </label>
            <select class="font-semibold p-4 rounded bg-white text-customBlue cursor-pointer w-5/12  md:w-48 mt-4">
              <option>Categorie</option>
              <option>Actie</option>
              <option>Avontuur</option>
              <option>Familie</option>`\
            </select>
          </div>
        </div>

        <div class="overflow-x-auto overflow-hidden flex space-x-4 mt-8" id="film-container">
          <?php foreach ($data['data'] as $movie): ?>
            <div class="bg-white rounded transform transition-transform duration-300 hover:scale-105 flex-shrink-0 w-64 pb-2 flex flex-col justify-between">
              <div>
                <img src="<?= htmlspecialchars($movie['image'] ?? 'assets/films/default.jpg') ?>" alt="Movie" class="w-full h-80 object-cover mb-4">
                <h3 class="text-lg font-bold pl-4"><?= htmlspecialchars($movie['title'] ?? 'N/A') ?></h3>
                <p class="pl-4 pt-2">Release: <?= htmlspecialchars(date('Y-m-d', strtotime($movie['release_date'] ?? ''))) ?></p>
                <p class="text-sm pl-2 pt-4 line-clamp-3"><?= htmlspecialchars($movie['description'] ?? 'N/A') ?></p>
              </div>
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
        </div>
        <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 mr-1 rounded" onclick="scrollRight()">→</button>
        <div class="mb-12"></div>
        <div class="">
          <form action="agenda.php" id="test" method="POST" style="display: inline;">
            <input type="hidden" name="id" value="<?= htmlspecialchars($movie['id'] ?? '') ?>">
            <input type="hidden" name="title" value="<?= htmlspecialchars($movie['title'] ?? 'N/A') ?>">
            <input type="hidden" name="release_date" value="<?= htmlspecialchars(date('Y-m-d', strtotime($movie['release_date'] ?? ''))) ?>">
            <input type="hidden" name="description" value="<?= htmlspecialchars($movie['description'] ?? 'N/A') ?>">
            <input type="hidden" name="genre" value="<?= htmlspecialchars(json_encode($movie['genres'] ?? 'N/A')) ?>">
            <input type="hidden" name="duration" value="<?= htmlspecialchars($movie['duration'] ?? 'N/A') ?>">
            <input type="hidden" name="images" value="<?= htmlspecialchars($movie['banner_path'] ?? 'assets/films/default.jpg') ?>">
            <input type="hidden" name="actors" value="<?= htmlspecialchars(json_encode($movie['actors'] ?? 'N/A')) ?>">
            <input type="hidden" name="director" value="<?= htmlspecialchars(json_encode($movie['directors'] ?? 'N/A')) ?>">
            <input type="hidden" name="imdb_score" value="<?= htmlspecialchars($movie['rating'] ?? 'N/A') ?>">
            <input type="hidden" name="trailer_url" value="<?= htmlspecialchars($movie['trailer_link'] ?? 'N/A') ?>">
            <button type="submit" class="pl-4 pt-6 pb-6 pr-4 text-center bg-customBlue text-white hover:bg-customBlueLight rounded font-bold">Bekijk Alle Films</button>
          </form>
        </div>
      </div>
    </section>
  </main>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>