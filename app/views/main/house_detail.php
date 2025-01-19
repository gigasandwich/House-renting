<div class="row">
    <div class="col-md-8">
        <div id="houseCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($photos as $index => $photo) { ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>" class="d-block w-100" alt="House Photo">
                    </div>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#houseCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#houseCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-4">
        <h3><?= $house['nom_type'] ?></h3>
        <p><?= $house['description'] ?></p>
        <p><strong>Chambres:</strong> <?= $house['chambres'] ?></p>
        <p><strong>Loyer par jour:</strong> <?= $house['loyer_par_jour'] ?> €</p>
        <p><strong>Quartier:</strong> <?= $house['quartier'] ?></p>
    </div>
</div>