<?PHP
require_once '../../functions/Autoload.php';


$postData = $_POST;
$fileData = $_FILES;


try {
    if (!empty($fileData["image"]["tmp_name"])) {
        $image = Images::uploadImage("../../images/icons", $_FILES['image']);
    } else {
        $image = $postData['image'];
    }

    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Images::deleteImage("../../images/icons/" . $_POST['image']);
        Comment::update($postData['id'], $postData['equipment_id'], $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));
    } else {
        Comment::create($postData['equipment_id'], $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));
    }
} catch (Exception $e) {
    die("no se pudo cargar el comentario");
}
header('Location: ../../index.php?page=equipment-details&id=' . $postData['equipment_id']);
