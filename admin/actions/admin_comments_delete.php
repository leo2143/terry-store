<?PHP
require_once '../../class/Comment.php';
require_once '../../class/Connection.php';
require_once '../../class/Images.php';

$postData = $_POST;
$fileData = $_FILES;




try {

} catch (Exception $e) {
    die("no se pudo eliminar comentario");
}
header('Location: ../index.php?page=admin_comments');
