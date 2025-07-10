<?php
$featureId = $_GET["id"] ?? 0;
$feature = null;
if ($featureId != 0) {
    $feature = Features::getById($featureId);
}
?>
<div class="container">
    <div class="row justify-content-center mt-5 sheika-container">
        <div class="col-12">
            <div class=" bg-secondary-light-20 border-0 p-4 shadow-sm">
                <form action="actions/admin_feature_acc.php" method="post" enctype="multipart/form-data">
                    <?php if ($feature): ?>
                        <input type="hidden" name="id" value="<?= $feature->getId(); ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">Nombre</label>
                        <input type="text" class="form-control form-control-custom" id="name" value="<?= isset($feature) ? $feature->getName() : ""; ?>" name="name" placeholder="" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>