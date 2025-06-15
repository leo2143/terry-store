<?PHP
require_once '../../class/Comment.php';
require_once '../../class/Connection.php';
require_once '../../class/Images.php';

$postData = $_POST;
$fileData = $_FILES;




try {
    if (!empty($fileData["image"]["tmp_name"])) {
        $image = Image::uploadImage("../../images/icons", $_FILES['image']);
        if (isset($postData['id']) && is_numeric($postData['id'])) Image::deleteImage("../../images/icons/" . $_POST['image']);
    } else {
        $image = $postData['image'];
    }

    if (isset($postData['id']) && is_numeric($postData['id'])) {
        Comment::update($postData['id'], $postData['equipment_id'], $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));
    } else {
        Comment::create(1, $postData['username'], $image, $postData['content'], $postData['rating'], date("Y/m/d"));
    }
} catch (Exception $e) {
    die("no se pudo cargar el comentario");
}
header('Location: ../index.php?page=admin_comments');
