<div class="row align-items-start">
    <!-- Text Info -->
    <div class="col-md-5">
        <h3 class="mb-3"><?= $house['nom_type'] ?></h3>
        <p data-translate="description"><?= $house['description'] ?></p>
        <p>
            <strong data-translate="bedrooms">Chambres:</strong> <?= $house['chambres'] ?>
        </p>
        <p>
            <strong data-translate="rent_per_day">Loyer par jour:</strong> <?= $house['loyer_par_jour'] ?> €
        </p>
        <p>
            <strong data-translate="neighborhood">Quartier:</strong> <?= $house['quartier'] ?>
        </p>

        <!-- Reservation Form -->
        <form id="reservationForm" class="mt-4 p-3 border rounded shadow-sm">
            <h4 class="mb-3" data-translate="reserve_this_house">Réservez cette habitation</h4>
            <div class="mb-3">
                <label for="arrivalDate" class="form-label" data-translate="arrival_date">Date d'arrivée</label>
                <input type="date" id="arrivalDate" name="arrivalDate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="departureDate" class="form-label" data-translate="departure_date">Date de départ</label>
                <input type="date" id="departureDate" name="departureDate" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" data-translate="reserve">Reserve Now</button>
            <div id="errorMessage" class="text-danger mt-2 d-none"></div>
        </form>
    </div>

    <!-- Photos Section -->
    <div class="col-md-7">
        <!-- Main Image -->
        <div id="mainPhotoContainer" class="mb-4">
            <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photos[0]['photo_url'] ?>" 
                 class="img-fluid rounded shadow" 
                 alt="Main Photo" 
                 style="height: 400px; object-fit: cover; width: 100%;" 
                 data-translate="main_photo">
        </div>

        <!-- Thumbnails (Horizontal Scrolling) -->
        <div id="photoGallery" class="d-flex overflow-auto gap-2" data-translate="photos_gallery">
            <?php foreach ($photos as $index => $photo) { ?>
                <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>" 
                     class="clickable-photo rounded shadow <?= $index === 0 ? 'active-thumbnail' : '' ?>" 
                     data-photo-url="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>" 
                     style="height: 80px; cursor: pointer;">
            <?php } ?>
        </div>
    </div>
</div>
