<?PHP
require_once '../../functions/Autoload.php';



$postData = $_POST;
$fileData = $_FILES;

$name = $_POST['name'];
$type = $_POST['type'];
$categoryId = (int) $_POST['category'];
$rarityId = (int) $_POST['rarity'];
$material = $_POST['material'];
$ability = $_POST['ability'] ?? '';
$description = $_POST['description'];
$price = (float) $_POST['price'];
$dateAdded = date('Y-m-d');
$features = $_POST["features"] ?? [];



try {

    if (!empty($fileData["image"]["tmp_name"])) {
        $image = Images::uploadImage("../../images/items", $_FILES['image']);
    } else {
        $image = $postData['image'];
    }

    if (isset($postData['id']) && is_numeric($postData['id'])) {
        $equipment = Equipment::getById($postData['id']);

        Images::deleteImage("../../images/items/" . $_POST['image']);
        $equipment->deleteEquipmentFeature();
        if (isset($features)) {
            Equipment::insertEquipmentFeature($equipment->getId(), $features);
        }

        Equipment::update(
            $postData['id'],
            $name,
            $type,
            $categoryId,
            $rarityId,
            $material,
            $ability,
            $description,
            $price,
            $dateAdded,
            $image
        );
    } else {
        $equipmentId =  Equipment::create(
            $name,
            $type,
            $categoryId,
            $rarityId,
            $material,
            $ability,
            $description,
            $price,
            $dateAdded,
            $image
        );

        if (isset($features)) {
            Equipment::insertEquipmentFeature($equipmentId, $features);
        }
    }
} catch (Exception $e) {
    die("no se pudo cargar el equipamiento");
}
header('Location: ../index.php?page=admin_equipments');
