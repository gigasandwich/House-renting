<!-- Create Modal -->
<div class="modal fade" id="addHouseModal" tabindex="-1" aria-labelledby="addHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHouseModalLabel">Add New House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addHouseForm" method="POST" action="<?= $baseUrl ?>/create/house" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Columns -->
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-type_id" class="form-label">Type</label>
                                <select class="form-select" name="type_id" id="modal-type_id" required>
                                    <option value="1">Maison</option>
                                    <option value="2">Appartement</option>
                                    <option value="3">Studio</option>
                                    <option value="4">Villa</option>
                                    <option value="5">Bungalow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-chambres" class="form-label">Chambres</label>
                                <input type="number" class="form-control" name="chambres" value="1">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-loyer_par_jour" class="form-label">Loyer par jour</label>
                                <input type="number" class="form-control" name="loyer_par_jour" step="0.01" value="100.00">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-quartier" class="form-label">Quartier</label>
                                <input type="text" class="form-control" name="quartier" value="Centre-ville">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description" rows="1">Description de la maison</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- List of the houses -->
<table class="table table-bordered caption-top" id="modify-table">
    <caption class="">Modify houses</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Chambres</th>
            <th>Loyer par jour</th>
            <th>Quartier</th>
            <th>Description</th>
            <th>Actions</th>
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
                        data-quartier="<?= $house['quartier'] ?>" data-description="<?= $house['description'] ?>">Edit</a>

                    <a href="<?= $baseUrl ?>/delete/house/?habitation_id=<?= $house['habitation_id'] ?>" class="btn btn-danger delete-btn">Delete</a>
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
                <h5 class="modal-title" id="modifyModalLabel">Modify House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modifyForm" method="POST" action="<?= $baseUrl ?>/update/house" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Columns -->
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-habitation_id" class="form-label">House ID</label>
                                <input type="text" class="form-control" name="habitation_id" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-type_id" class="form-label">Type</label>
                                <select class="form-select" name="type_id" id="modal-type_id" required>
                                    <option value="1">Maison</option>
                                    <option value="2">Appartement</option>
                                    <option value="3">Studio</option>
                                    <option value="4">Villa</option>
                                    <option value="5">Bungalow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-chambres" class="form-label">Chambres</label>
                                <input type="number" class="form-control" name="chambres">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-loyer_par_jour" class="form-label">Loyer par jour</label>
                                <input type="number" class="form-control" name="loyer_par_jour" step="0.01">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="modal-quartier" class="form-label">Quartier</label>
                                <input type="text" class="form-control" name="quartier">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label for="modal-description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Modify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
