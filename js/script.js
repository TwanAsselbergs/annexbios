// Burger Menu & Side Menu

document
  .getElementById("burger-menu")
  .addEventListener("click", function (event) {
    event.stopPropagation();
    var sideMenu = document.getElementById("side-menu");
    var overlay = document.getElementById("overlay");
    if (sideMenu.classList.contains("translate-x-full")) {
      sideMenu.classList.remove("translate-x-full");
      sideMenu.classList.add("translate-x-0");
      overlay.classList.remove("hidden");
    } else {
      sideMenu.classList.remove("translate-x-0");
      sideMenu.classList.add("translate-x-full");
      overlay.classList.add("hidden");
    }
  });

document.addEventListener("click", function (event) {
  var sideMenu = document.getElementById("side-menu");
  var burgerMenu = document.getElementById("burger-menu");
  if (!sideMenu.contains(event.target) && !burgerMenu.contains(event.target)) {
    sideMenu.classList.add("translate-x-full");
    sideMenu.classList.remove("translate-x-0");
    overlay.classList.add("hidden");
  }
});

// Nav Underline & Color

document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".nav-link");
  const underline = document.getElementById("underline");

  function setUnderlinePosition(link) {
    const rect = link.getBoundingClientRect();
    const navRect = link.closest("nav").getBoundingClientRect();
    underline.style.width = `${rect.width}px`;
    underline.style.left = `${rect.left - navRect.left}px`;
  }

  const currentPath = window.location.pathname;
  let activeLink = null;

  navLinks.forEach((link) => {
    if (link.pathname === currentPath) {
      activeLink = link;
      link.classList.add("text-blue-400");
    }
    link.addEventListener("click", function (e) {
      e.preventDefault();
      navLinks.forEach((nav) => nav.classList.remove("text-blue-400"));
      setUnderlinePosition(link);
      window.location.href = link.href;
    });
  });

  if (activeLink) {
    setUnderlinePosition(activeLink);
  } else {
    underline.style.width = "0";
  }

  window.addEventListener("load", function () {
    if (activeLink) {
      setUnderlinePosition(activeLink);
    } else {
      underline.style.width = "0";
    }
  });
});

// Films Arrow Animation

function scrollRight() {
  const container = document.getElementById("film-container");
  container.scrollBy({ left: 800, behavior: "smooth" });
}

// Input Label Animation

function handleFocus(input) {
  const label = input.previousElementSibling;
  label.classList.add(
    "transform",
    "-translate-y-4",
    "-translate-x-2",
    "scale-75"
  );
}

function handleBlur(input) {
  if (input.value === "") {
    const label = input.previousElementSibling;
    label.classList.remove(
      "transform",
      "-translate-y-4",
      "-translate-x-2",
      "scale-75"
    );
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll("input");
  inputs.forEach((input) => {
    const label = input.previousElementSibling;
    if (input.value !== "") {
      label.classList.add(
        "transform",
        "-translate-y-4",
        "-translate-x-2",
        "scale-75"
      );
    }
  });
});

// Ticket/Seat Functionality

let selectedSeats = [];

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("close-modal").addEventListener("click", hideModal);
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("close-second-modal")
    .addEventListener("click", hideSecondModal);
});

function selectSeat(seatElement) {
  const totalTickets = getTotalTickets();
  if (totalTickets === 0) {
    showModal();
    return;
  }

  const seatId = seatElement.getAttribute("data-seat-id");
  const row = seatElement.getAttribute("data-row");
  const seatNumber = seatElement.getAttribute("data-seat-number");
  const seatFilm = seatElement.getAttribute("data-film");
  const img = seatElement.querySelector("img");

  if (seatElement.classList.contains("selected")) {
    seatElement.classList.remove("selected");
    img.src = "./assets/zalen/seat.png";
    selectedSeats = selectedSeats.filter((seat) => seat.seatId !== seatId);
  } else {
    if (selectedSeats.length < totalTickets) {
      seatElement.classList.add("selected");
      img.src = "./assets/zalen/seat_selected.png";
      selectedSeats.push({ seatId, row, seatNumber, seatFilm });
    } else {
      showSecondModal();
    }
  }
  updateSelectedSeats();
  updateOrderSummary();
  displaySelectedSeats();
  updateSelectedSeatsInput();
}

function updateSelectedSeatsInput() {
  const selectedSeatsInput = document.getElementById("selected-seats-input");
  const seatNumbers = selectedSeats
    .map((seat) => `${seat.seatId}-${seat.row}-${seat.seatNumber}`)
    .join(",");
  selectedSeatsInput.value = seatNumbers;
}

function showModal() {
  const modal = document.getElementById("custom-modal");
  modal.classList.remove("hidden");
}

function hideModal() {
  const modal = document.getElementById("custom-modal");
  modal.classList.add("hidden");
}

function showSecondModal() {
  const modal = document.getElementById("second-modal");
  modal.classList.remove("hidden");
}

function hideSecondModal() {
  const modal = document.getElementById("second-modal");
  modal.classList.add("hidden");
}

function getTotalTickets() {
  let total = 0;
  document.querySelectorAll("select.ticket-amount").forEach((select) => {
    total += parseInt(select.value);
  });
  return total;
}

function updateSelectedSeats() {
  // console.log(selectedSeats);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "backend/update_seats.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status == 200) {
      console.log("Stoelen zijn geupdatet binnen de session.");
    }
  };
  xhr.send("seats=" + JSON.stringify(selectedSeats));
}

function displaySelectedSeats() {
  const seatDisplay = document.getElementById("selected-seats");
  const seatText = selectedSeats
    .map((seat) => `Rij ${seat.row}, Stoel ${seat.seatNumber}`)
    .join(", ");
  seatDisplay.textContent = seatText;
}

function updateOrderSummary() {
  let totalTickets = getTotalTickets();
  let totalPrice = calculateTotalPrice();
  document.getElementById("total-tickets").textContent = totalTickets;
  document.getElementById("total-price").textContent = totalPrice
    .toFixed(2)
    .replace(".", ",");
}

function calculateTotalPrice() {
  let totalPrice = 0;
  document.querySelectorAll("select.ticket-amount").forEach((select) => {
    const amount = parseInt(select.value);
    const price = parseFloat(select.getAttribute("data-price"));
    totalPrice += amount * price;
  });
  return totalPrice;
}

document.querySelectorAll("select.ticket-amount").forEach((select) => {
  select.addEventListener("change", updateOrderSummary);
});

updateOrderSummary();
displaySelectedSeats();

function validateForm() {
  const select = document.getElementById("movie-select");
  const movieValue = select.value;

  if (!movieValue) {
    showModal();
    return false;
  }

  const movie = JSON.parse(movieValue);

  document.getElementById("movie-api_id").value = movie.api_id || "";
  document.getElementById("movie-title").value = movie.title || "N/A";
  document.getElementById("movie-release-date").value =
    movie.release_date || "";
  document.getElementById("movie-description").value =
    movie.description || "N/A";
  document.getElementById("movie-genres").value = movie.genres || "N/A";
  document.getElementById("movie-length").value = movie.length || "N/A";
  document.getElementById("movie-image").value =
    movie.image || "assets/films/default.jpg";
  document.getElementById("movie-actors").value = movie.actors || "N/A";
  document.getElementById("movie-director").value = movie.directors || "N/A";
  document.getElementById("movie-rating").value = movie.rating || "N/A";
  document.getElementById("movie-trailer-link").value =
    movie.trailer_link || "N/A";

  return true;
}

function showModal() {
  document.getElementById("no-movie-modal").classList.remove("hidden");
}

function closeModal() {
  document.getElementById("no-movie-modal").classList.add("hidden");
}
