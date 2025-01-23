$(document).ready(function () {
    const $mainPhoto = $('#mainPhotoContainer img');
    const $thumbnails = $('#photoGallery .clickable-photo');
    const $errorMessage = $('#errorMessage');

    // Update main photo when a thumbnail is clicked
    $thumbnails.on('click', function () {
        const photoUrl = $(this).data('photo-url');

        // Update the main photo
        $mainPhoto.attr('src', photoUrl);

        // Remove active-thumbnail class from all thumbnails
        $thumbnails.removeClass('active-thumbnail');

        // Add active-thumbnail class to the clicked thumbnail
        $(this).addClass('active-thumbnail');
    });

    // Handle form submission
    $('form').on('submit', function (e) {
        const arrivalDate = $('#arrivalDate').val();
        const departureDate = $('#departureDate').val();

        if (!checkAvailability(arrivalDate, departureDate)) {
            e.preventDefault();
            $errorMessage.removeClass('d-none').text("L'habitation n'est pas disponible pour les dates sélectionnées.");
        }
    });

    // Dummy availability check
    function checkAvailability(arrivalDate, departureDate) {
        // Add logic to verify availability (e.g., fetch data from the server)
        return true; // Assume available for now
    }
});

/* VANILLA JS */

/*
document.addEventListener("DOMContentLoaded", () => {
    const mainPhoto = document.querySelector("#mainPhotoContainer img");
    const thumbnails = document.querySelectorAll("#photoGallery .clickable-photo");
    const reservationForm = document.querySelector("#reservationForm");
    const errorMessage = document.querySelector("#errorMessage");

    // Update main photo when a thumbnail is clicked
    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("click", () => {
            const photoUrl = thumbnail.dataset.photoUrl;

            // Update the main photo
            mainPhoto.src = photoUrl;

            // Remove active-thumbnail class from all thumbnails
            thumbnails.forEach((thumb) => thumb.classList.remove("active-thumbnail"));

            // Add active-thumbnail class to the clicked thumbnail
            thumbnail.classList.add("active-thumbnail");
        });
    });

    // Handle form submission
    reservationForm.addEventListener("submit", (e) => {
        const arrivalDate = document.querySelector("#arrivalDate").value;
        const departureDate = document.querySelector("#departureDate").value;

        if (!checkAvailability(arrivalDate, departureDate)) {
            e.preventDefault();
            errorMessage.classList.remove("d-none");
            errorMessage.textContent = "L'habitation n'est pas disponible pour les dates sélectionnées.";
        }
    });

    // Dummy availability check
    function checkAvailability(arrivalDate, departureDate) {
        // Add logic to verify availability (e.g., fetch data from the server)
        return true; // Assume available for now
    }
});

*/