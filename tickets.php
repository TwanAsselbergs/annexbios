<?php
session_start();
include 'backend/order.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="output.css" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="js/script.js" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>AnnexBios</title>
</head>

<body class="font-lato">
  <?php include 'src/root/header.php'; ?>
  <main>
    <section class="w-full md:pt-36 pb-12 md:pb-36 bg-black flex flex-col items-center justify-center background-chairs">
      <div class="w-11/12 md:w-5/6 mt-36 relative">
        <h2 class="bg-white p-8 rounded text-customBlue text-3xl md:text-6xl font-bold w-full">Tickets Bestellen</h2>
        <div class="flex flex-col md:flex-row">
          <div class="flex flex-wrap">
            <div class="font-semibold bg-white p-4 rounded items-center mt-4 text-customBlue mr-4 cursor-pointer">
              <span class="pl-2">Jurassic World</span>
            </div>
            <select class="font-semibold p-4 rounded bg-white text-customBlue cursor-pointer mt-4 mr-4" id="date">
              <option>Datum</option>
              <option>01-01-2000</option>
              <option>02-01-2000</option>
              <option>03-01-2000</option>
            </select>
            <select class="font-semibold p-4 rounded bg-white text-customBlue cursor-pointer mt-4" id="time">
              <option>Tijdstip</option>
              <option>16:00</option>
              <option>19:00</option>
              <option>22:00</option>
            </select>
          </div>
        </div>
      </div>
      <div class="bg-white p-8 rounded w-11/12 md:w-5/6 mt-12 mb-12">
        <div class="w-full rounded text-customBlue pr-12">
          <h2 class="font-semibold text-3xl">Stap 1: Kies Je Ticket</h2>
          <div class="mt-4 text-gray-400 text-lg">
            <div class="flex justify-between">
              <div class="w-1/3">
                <p class="font-semibold">Type</p>
              </div>
              <div class="w-2/3 flex justify-end space-x-4">
                <p class="font-semibold pr-2">Prijs</p>
                <p class="font-semibold">Aantal</p>
              </div>
            </div>
            <hr class="my-4">
            <div class="flex items-center mt-2 justify-between">
              <div class="w-1/3">
                <p>Normaal</p>
              </div>
              <div class="w-2/3 flex justify-end space-x-5">
                <p>€9,00</p>
                <select class="ticket-amount font-semibold pl-4 pr-1 rounded bg-white text-customBlue cursor-pointer" data-price="9.00">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                </select>
              </div>
            </div>
            <div class="flex items-center mt-2 justify-between">
              <div class="w-1/3">
                <p>Kind t/m 11 jaar</p>
              </div>
              <div class="w-2/3 flex justify-end space-x-5">
                <p>€5,00</p>
                <select class="ticket-amount font-semibold pl-4 pr-1 rounded bg-white text-customBlue cursor-pointer" data-price="5.00">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                </select>
              </div>
            </div>
            <div class="flex items-center mt-2 justify-between">
              <div class="w-1/3">
                <p>65+</p>
              </div>
              <div class="w-2/3 flex justify-end space-x-5">
                <p>€7,00</p>
                <select class="ticket-amount font-semibold pl-4 pr-1 rounded bg-white text-customBlue cursor-pointer" data-price="7.00">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                </select>
              </div>
            </div>
            <hr class="my-4">
          </div>
          <div class="flex">
            <p class="font-semibold pr-12">Vouchercode</p>
            <input type="text" placeholder="Code" class="border rounded w-full pl-2">
            <a href="#" class="bg-customBlue text-center text-white ml-12 pl-8 pr-8 p-1 rounded font-semibold hover:bg-customBlueLight">Toevoegen</a>
          </div>
          <h2 class="font-semibold text-3xl pt-16">Stap 2: Kies Je Stoel</h2>
          <h2 class="text-4xl font-semibold text-center pb-2 pt-8 ml-16">Filmdoek</h2>
          <hr class="pb-8 h-4">
          <div class="grid grid-cols-12 w-1/2 ml-96 mt-4" id="seat-selection">
            <?php include 'backend/seats.php' ?>
          </div>
        </div>
        <form action="confirmation.php" method="POST" name="checkout-form">
          <input type="hidden" id="selected-seats-input" name="selected_seats" value="">
          <h2 class="font-semibold text-3xl pt-16 pb-8 text-customBlue">Stap 3: Controleer Je Bestelling</h2>
          <div class="w-1/2 p-2 text-gray-500">
            <div class="flex">
              <img src="assets/films/Jurassic-World_-Fallen-Kingdom.jpg" alt="Film" class="w-2/6 rounded">
              <div class="ml-4 flex flex-col justify-center">
                <h3 class="text-3xl font-semibold">Jurassic World: Fallen Kingdom</h3>
                <div class="flex space-x-2 pt-4 pb-4">
                  <img src="assets/kijkwijzers/kijkwijzer-12.png" alt="12" class="w-12 h-12">
                  <img src="assets/kijkwijzers/kijkwijzer-eng.png" alt="Eng" class="w-12 h-12">
                  <img src="assets/kijkwijzers/kijkwijzer-geweld.png" alt="Geweld" class="w-12 h-12">
                </div>
                <p><span class="font-semibold">Bioscoop:</span> Montfoort (Zaal 1)</p>
                <p><span class="font-semibold">Wanneer:</span> 11 juni 14:15</p>
                <p><span class="font-semibold">Stoelen:</span> <span id="selected-seats">-</span></p>
                <div><span class="font-semibold">Tickets:</span> <span id="total-tickets">-</span></div>
                <p class="pt-4"><span class="font-semibold">Totaal:</span> €<span id="total-price">-</span></p>
              </div>
            </div>
          </div>
          <h2 class="font-semibold text-3xl pt-16 pb-8 text-customBlue">Stap 4: Vul Je Gegevens In</h2>
          <div class="flex flex-col space-y-4">
            <div class="flex">
              <div class="relative">
                <label for="voornaam" class="absolute left-2 top-2 text-gray-500 transition-all duration-200 ease-in-out pt-1.5 w-14">Voornaam</label>
                <input type="text" id="voornaam" name="firstname" class="border rounded p-3 pt-4 w-64 mr-2 focus:outline-none text-customBlue" onfocus="handleFocus(this)" onblur="handleBlur(this)">
              </div>
              <div class="relative">
                <label for="achternaam" class="absolute left-2 top-2 text-gray-500 transition-all duration-200 ease-in-ou pt-1.5 w-14">Achternaam*</label>
                <input type="text" id="achternaam" name="lastname" class="border rounded p-3 pt-4 w-64 focus:outline-none text-customBlue" required onfocus="handleFocus(this)" onblur="handleBlur(this)">
              </div>
            </div>
            <div class="relative">
              <label for="email" class="absolute left-2 top-2 text-gray-500 transition-all duration-200 ease-in-out pt-1.5 w-14">E-mail*</label>
              <input type="email" id="email" name="email" class="border rounded p-3 pt-4 w-128 focus:outline-none text-customBlue" required onfocus="handleFocus(this)" onblur="handleBlur(this)">
            </div>
            <div class="relative">
              <label for="tel" class="absolute left-2 top-2 text-gray-500 transition-all duration-200 ease-in-out pt-1.5 w-14">Telefoonnummer*</label>
              <input type="tel" id="tel" name="tel" class="border rounded p-3 pt-4 w-128 focus:outline-none text-customBlue" required onfocus="handleFocus(this)" onblur="handleBlur(this)">
            </div>
          </div>
          <h2 class="font-semibold text-3xl pt-16 pb-8 text-customBlue">Stap 5: Kies Je Betaalwijze</h2>
          <div class="flex flex-space-x-4 pb-8">
            <div class="flex items-center space-x-2 mr-4">
              <input type="radio" id="bon" name="payment" value="bon" class="form-radio h-5 w-5 text-blue-600 cursor-pointer">
              <label for="bon">
                <img src="assets/logo/bon.png" alt="Nationale Bioscoopbon" class="w-24 h-12 cursor-pointer">
              </label>
            </div>
            <div class="flex items-center space-x-2 mr-4">
              <input type="radio" id="maestro" name="payment" value="maestro" class="form-radio h-5 w-5 text-blue-600 cursor-pointer">
              <label for="maestro">
                <img src="assets/logo/maestro.png" alt="Maestro" class="w-18 h-12 cursor-pointer">
              </label>
            </div>
            <div class="flex items-center space-x-2 mr-4">
              <input type="radio" id="ideal" name="payment" value="ideal" class="form-radio h-5 w-5 text-blue-600 cursor-pointer">
              <label for="ideal">
                <img src="assets/logo/ideal.png" alt="iDeal" class="w-16 h-14 cursor-pointer">
              </label>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <input type="checkbox" id="agreement" class="form-checkbox h-5 w-5 cursor-pointer">
            <label for="agreement" class="cursor-pointer text-customBlue">Ja, ik ga akkoord met de algemene voorwaarden.</label>
          </div>
      </div>
      </div>
      <div class="w-11/12 md:w-5/6">
        <button id="checkout-button" class="bg-customBlue text-white text-center rounded p-8 text-4xl font-bold w-full">Afrekenen</button>
      </div>
      </form>
    </section>
  </main>
  <div id="custom-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden z-50">
    <div class="bg-white p-8 rounded text-center">
      <p>Kies eerst je ticket.</p>
      <button id="close-modal" type="submit" class="mt-4 bg-customBlue hover:bg-customBlueLight text-white px-4 py-2 rounded font-semibold">Sluiten</button>
    </div>
  </div>
  <div id="second-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden z-50">
    <div class="bg-white p-8 rounded text-center">
      <p>Voeg een extra ticket toe.</p>
      <button id="close-second-modal" class="mt-4 bg-customBlue hover:bg-customBlueLight text-white px-4 py-2 rounded font-semibold">Sluiten</button>
    </div>
  </div>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>