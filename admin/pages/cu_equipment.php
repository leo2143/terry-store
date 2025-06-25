<?php
$rarities = Rarities::getAll();
$categories = Categories::getAll();
$features = Features::getAll();
$selectedCategoryId = isset($equipment) && $equipment ? $equipment->getCategory()->getId() : null;
$selectedRarityId = isset($equipment) && $equipment ? $equipment->getRarity()->getId() : null;


$equipmentId = $_GET["id"] ?? 0;
$equipment = null;

if ($equipmentId != 0) {
    $equipment = Equipment::getById($equipmentId);
}
?>
<div class="container">
    <div class="row justify-content-center mt-5 sheika-container">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="bg-secondary-light-20 border-0 p-4 shadow-sm rounded">
                <form action="actions/admin_equipment_acc.php" method="post" enctype="multipart/form-data">
                    <?php if ($equipment): ?>
                        <input type="hidden" name="id" value="<?= $equipment->getId(); ?>">
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label text-light">Nombre</label>
                            <input type="text" class="form-control form-control-custom" id="name" name="name"
                                value="<?= $equipment ? $equipment->getName() : ''; ?>"
                                placeholder="Espada Maestra…" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label text-light">Tipo</label>
                            <select class="form-select form-select-custom" id="type" name="type" required>
                                <option value="">– Selecciona –</option>
                                <option value="sword" <?= $equipment && $equipment->getType() === 'sword' ? 'selected' : ''; ?>>Arma</option>
                                <option value="Escudo" <?= $equipment && $equipment->getType() === 'Escudo' ? 'selected' : ''; ?>>Escudo</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label text-light">Categoría</label>
                            <select class="form-select form-select-custom" id="category" name="category" required>
                                <option value="">– Selecciona –</option>
                                <?php foreach ($categories as $categorie): ?>
                                    <option value="<?= $categorie->getId(); ?>"
                                        <?= $categorie->getId() == $selectedCategoryId  ? "selected" : ""; ?>>
                                        <?= $categorie->getName(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="rarity" class="form-label text-light">Rareza</label>
                            <select class="form-select form-select-custom" id="rarity" name="rarity" required>
                                <option value="">– Selecciona –</option>
                                <?php foreach ($rarities as $raritie): ?>
                                    <option value="<?= $raritie->getId(); ?>"
                                        <?=  $raritie->getId() ==  $selectedRarityId ? 'selected' : ''; ?>>
                                        <?= $raritie->getName(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label text-light">Material</label>
                            <input type="text" class="form-control form-control-custom" id="material" name="material"
                                value="<?= $equipment ? $equipment->getMaterial() : ''; ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ability" class="form-label text-light">Habilidad</label>
                            <input type="text" class="form-control form-control-custom" id="ability" name="ability"
                                value="<?= $equipment ? $equipment->getAbility() : ''; ?>" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="price" class="form-label text-light">Precio</label>
                            <input type="number" step="0.01" class="form-control form-control-custom" id="price" name="price"
                                placeholder="Ej: 1500.00"
                                value="<?= $equipment ? $equipment->getPrice() : ''; ?>" required>
                        </div>
                        <div class="col-md-12 mb-3 ">
                            <label class="form-label text-light ">Características</label>
                            <div class="checks-container p-4">
                                <?php foreach ($features as $feature): ?>
                                    <div class="col-md-5 mb-3 form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="features[]" id="feature_<?= $feature->getId(); ?>" value="<?= $feature->getId(); ?>" <?= (isset($equipment) && in_array($feature->getId(), $equipment->getFeaturesIds())) ? "checked" : ""; ?>>
                                        <label class="form-check-label text-light mb-2" for="feature_<?= $feature->getId(); ?>"><?= $feature->getName(); ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="description" class="form-label text-light">Descripción</label>
                            <textarea class="form-control form-control-custom" id="description" name="description"
                                rows="4" placeholder="Describe brevemente el equipamiento…" required><?= $equipment ? $equipment->getDescription() : ''; ?></textarea>
                        </div>



                        <div class="col-12 mb-3 custom-file-upload">
                            <?php if ($equipment && $equipment->getImage()): ?>
                                <label for="image" class="form-label text-light">Imagen actual</label>
                                <input type="hidden" name="image" value="<?= $equipment->getImage(); ?>">

                                <img src="../images/items/<?= $equipment->getImage(); ?>" alt="Imagen actual" class="img-fluid mb-2">
                            <?php endif; ?>
                            <label for="image" class="btn btn-upload w-100 rounded-2">Subir imagen</label>
                            <input type="file" id="image" name="image" accept="image/*" <?= $equipment ? '' : 'required'; ?>>
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