<?PHP
require_once '../../functions/Autoload.php';


$postData = $_POST;
$fileData = $_FILES;
$isEdit = false;

try {
    if (!empty($fileData["image"]["tmp_name"])) {
        $image = Images::uploadImage("../../images/icons", $_FILES['image']);

        if (!empty($postData['image'])) {
            Images::deleteImage("../../images/icons/" . $postData['image']);
        }
    } else {
        $image = $postData['image'] ?? null;
    }
    if (isset($postData['id']) && is_numeric($postData['id'])) {

        Comment::update($postData['id'], $postData['equipment_id'], $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));

        Alert::add_alert(type: "success", message: "El comentario fue creado correctamente");
    } else {
        Comment::create($postData['equipment_id'], $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));
        Alert::add_alert(type: "success", message: "El comentario fue creado correctamente");
    }
} catch (Exception $e) {
    header('Location: ../index.php?page=admin_comments');

    Alert::add_alert("danger", message: "Ocurrio un error al " . $isEdit ? "actualizar" : "crear" . " el comentario");
}
header('Location: ../index.php?page=admin_comments');
