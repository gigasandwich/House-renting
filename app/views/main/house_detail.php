<div class="row">
    <div class="col-md-8">
        <div class="responsive">
            <div class="gallery">
                <?php foreach ($photos as $photo) { ?>
                    <a target="_blank" href="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>">
                        <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>" alt="House Photo" class="img-fluid">
                    </a>
                <?php } ?>
            </div>
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
