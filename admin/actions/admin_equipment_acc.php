<?PHP
require_once '../../class/Equipment.php';
require_once '../../class/Connection.php';

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

//validar si viene un campo id, si viene un campo id se ejecuta el update


try {
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
        "x"
    );
} catch (Exception $e) {
    die("no se pudo cargar");
}
header('Location: ../index.php?page=admin_equipments');
