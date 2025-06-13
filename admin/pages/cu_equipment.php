<?php
$rarities = Rarities::getAll();

$categories = Categories::getAll();


?>
<div class="container">
    <div class="row justify-content-center mt-5 sheika-container">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="bg-secondary-light-20 border-0 p-4 shadow-sm rounded">
                <form action="actions/admin_equipment_acc.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label text-light">Nombre</label>
                            <input type="text" class="form-control form-control-custom" id="name" name="name" placeholder="Espada Maestra…" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label text-light">Tipo</label>
                            <select class="form-select form-select-custom" id="type" name="type" required>
                                <option value="">– Selecciona –</option>
                                <option value="sword">Arma</option>
                                <option value="Escudo">Escudo</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label text-light">Categoría</label>
                            <select class="form-select form-select-custom" id="category" name="category" required>
                                <option value="">– Selecciona –</option>
                                <?PHP foreach ($categories as $categorie) { ?>
                                    <option value="<?= $categorie->getId(); ?>"><?= $categorie->getName(); ?></option>
                                <?PHP } ?>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="rarity" class="form-label text-light">Rareza</label>
                            <select class="form-select form-select-custom" id="rarity" name="rarity" required>
                                <option value="">– Selecciona –</option>
                                <?PHP foreach ($rarities as $raritie) { ?>
                                    <option value="<?= $raritie->getId(); ?>"><?= $raritie->getName(); ?></option>
                                <?PHP } ?>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label text-light">Material</label>
                            <input type="text" class="form-control form-control-custom" id="material" name="material" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ability" class="form-label text-light">Habilidad</label>
                            <input type="text" class="form-control form-control-custom" id="ability" name="ability">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="description" class="form-label text-light">Descripción</label>
                            <textarea class="form-control form-control-custom" id="description" name="description" rows="4" placeholder="Describe brevemente el equipamiento…" required></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label text-light">Precio</label>
                            <input type="number" step="0.01" class="form-control form-control-custom" id="price" name="price" placeholder="Ej: 1500.00" required>
                        </div>

                        <div class="col-12 mb-3 custom-file-upload">
                            <label for="image" class="btn btn-upload w-100 rounded-2">Subir imagen</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-custom w-100">Guardar equipamiento</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>