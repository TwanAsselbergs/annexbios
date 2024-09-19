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
      <div class="bg-customBlue p-6 md:p-14 rounded w-11/12 md:w-5/6 mt-48">
        <h1 class="text-white text-3xl md:text-6xl font-bold">Vragen of hulp nodig? Contacteer ons!</h1>
        <p class="text-white mt-6 mb-12">Lorem ipsum dolor sut amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.</p>
      </div>
      <div class="bg-white p-8 rounded w-11/12 md:w-5/6 mt-12 flex flex-col-reverse md:flex-row">
        <div class="bg-customBlue w-full rounded text-white text-lg">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.678160614637!2d4.329065315800799!3d52.07866357973307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b6b8b8b8b8b8%3A0x8b8b8b8b8b8b8b8b!2sRijksstraatweg%2042%2C%203223%20KA%20Hellevoetsluis%2C%20Netherlands!5e0!3m2!1sen!2sus!4v1634567890123!5m2!1sen!2sus"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            class="w-full rounded"></iframe>
          <p class="pt-6 pl-6 font-semibold">Rijksstraatweg 42</p>
          <p class="pl-6 font-semibold">3223 KA Hellevoetsluis</p>
          <p class="pt-4 pl-6 font-semibold hover:underline"><a href="tel:02012345678">020-12345678</a></p>
          <p class="pt-4 pl-6 font-semibold">Bereikbaarheid</p>
          <p class="pb-4 md:pb-8 pl-6 pr-2 md:pr-0">Onze bioscoop is gemakkelijk bereikbaar met zowel het openbaar vervoer als met de auto. Er is voldoende parkeergelegenheid in de buurt.</p>
        </div>
      </div>
    </section>
  </main>
  <?php include 'src/root/footer.php'; ?>
</body>

</html>