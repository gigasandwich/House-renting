<!-- Create Modal -->
<div class="modal fade" id="addHouseModal" tabindex="-1" aria-labelledby="addHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHouseModalLabel" data-translate="add_house_modal_title">Add New House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addHouseForm" method="POST" action="<?= $baseUrl ?>/create/house" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Columns -->
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-type_id" class="form-label" data-translate="type_label">Type</label>
                                <select class="form-select" name="type_id" id="modal-type_id" required>
                                    <option value="1" data-translate="house">Maison</option>
                                    <option value="2" data-translate="apartment">Appartement</option>
                                    <option value="3" data-translate="studio">Studio</option>
                                    <option value="4" data-translate="villa">Villa</option>
                                    <option value="5" data-translate="bungalow">Bungalow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-chambres" class="form-label" data-translate="rooms_label">Rooms</label>
                                <input type="number" class="form-control" name="chambres" value="1">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-loyer_par_jour" class="form-label" data-translate="rent_per_day_label">Rent per day</label>
                                <input type="number" class="form-control" name="loyer_par_jour" step="0.01" value="100.00">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-quartier" class="form-label" data-translate="neighborhood_label">Neighborhood</label>
                                <input type="text" class="form-control" name="quartier" value="Centre-ville">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-description" class="form-label" data-translate="description_label">Description</label>
                                <textarea type="text" class="form-control" name="description" rows="1" data-translate="description_placeholder">Description de la maison</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-photos" class="form-label" data-translate="photos_label">Photos</label>
                                <input type="file" class="form-control" name="photos[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg" data-translate="add_button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- List of the houses -->
<table class="table table-bordered caption-top" id="modify-table">
    <caption class="" data-translate="modify_houses_caption">Modify houses</caption>
    <thead>
        <tr>
            <th data-translate="id_label">ID</th>
            <th data-translate="type_label">Type</th>
            <th data-translate="rooms_label">Chambres</th>
            <th data-translate="rent_per_day_label">Loyer par jour</th>
            <th data-translate="neighborhood_label">Quartier</th>
            <th data-translate="description_label">Description</th>
            <th data-translate="actions_label">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($houses as $house) { ?>
            <tr>
                <td><?= $house['habitation_id'] ?></td>
                <td><?= $house['nom_type'] ?></td>
                <td><?= $house['chambres'] ?></td>
                <td><?= $house['loyer_par_jour'] ?></td>
                <td><?= $house['quartier'] ?></td>
                <td><?= $house['description'] ?></td>
                <td>
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modifyModal"
                        data-habitation_id="<?= $house['habitation_id'] ?>" data-type_id="<?= $house['type_id'] ?>"
                        data-chambres="<?= $house['chambres'] ?>" data-loyer_par_jour="<?= $house['loyer_par_jour'] ?>"
                        data-quartier="<?= $house['quartier'] ?>" data-description="<?= $house['description'] ?>" data-translate="edit_button">Edit</a>

                    <a href="<?= $baseUrl ?>/delete/house/?habitation_id=<?= $house['habitation_id'] ?>" class="btn btn-danger delete-btn" data-translate="delete_button">Delete</a>
                    
                    <a class="btn btn-info view-photos-btn" data-habitation_id="<?= $house['habitation_id'] ?>" data-translate="view_photos_button">View Photos</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- MODIFY/UPDATE Modal -->
<div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifyModalLabel" data-translate="modify_house_modal_title">Modify House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modifyForm" method="POST" action="<?= $baseUrl ?>/update/house" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Columns -->
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-habitation_id" class="form-label" data-translate="house_id_label">House ID</label>
                                <input type="text" class="form-control" name="habitation_id" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-type_id" class="form-label" data-translate="type_label">Type</label>
                                <select class="form-select" name="type_id" id="modal-type_id" required>
                                    <option value="1" data-translate="house">Maison</option>
                                    <option value="2" data-translate="apartment">Appartement</option>
                                    <option value="3" data-translate="studio">Studio</option>
                                    <option value="4" data-translate="villa">Villa</option>
                                    <option value="5" data-translate="bungalow">Bungalow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-chambres" class="form-label" data-translate="rooms_label">Chambres</label>
                                <input type="number" class="form-control" name="chambres">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-loyer_par_jour" class="form-label" data-translate="rent_per_day_label">Loyer par jour</label>
                                <input type="number" class="form-control" name="loyer_par_jour" step="0.01">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-quartier" class="form-label" data-translate="neighborhood_label">Quartier</label>
                                <input type="text" class="form-control" name="quartier">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-description" class="form-label" data-translate="description_label">Description</label>
                                <textarea type="text" class="form-control" name="description" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-photos" class="form-label" data-translate="photos_label">Photos</label>
                                <input type="file" class="form-control" name="photos[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg" data-translate="modify_button">Modify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Photos Modal -->
<div class="modal fade" id="viewPhotosModal" tabindex="-1" aria-labelledby="viewPhotosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPhotosModalLabel" data-translate="view_photos_modal_title">House Photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Left side: Main photo -->
                <div id="mainPhotoContainer" style="width: 50%; height: 100%; border-radius: 8px; overflow: hidden; position: relative;">
                    <!-- Main image inserted here with js -->
                </div>

                <!-- Right side: Carousel -->
                <div id="carouselContainer" style="width: 50%; height: 100%; padding-left: 15px;">
                    <div id="photosCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100" id="carouselInner">
                            <!-- Carousel images inserted here with js -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#photosCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden" data-translate="previous">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#photosCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden" data-translate="next">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>