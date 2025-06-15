<?PHP
require_once '../../class/Equipment.php';
require_once '../../class/Connection.php';
require_once '../../class/Images.php';


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
print_r($_POST);


try {
    if (!empty($fileData["image"]["tmp_name"])) {

        $image = Image::uploadImage("../../images/items", $_FILES['image']);
        if (isset($postData['id']) && is_numeric($postData['id'])) Image::deleteImage("../../images/items/" . $_POST['image']);
    } else {
        $image = $postData['image'];
    }

    if (isset($postData['id']) && is_numeric($postData['id'])) {
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
        Equipment::create(
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
    }
} catch (Exception $e) {
    die("no se pudo cargar el equipamiento");
}
header('Location: ../index.php?page=admin_equipments');
