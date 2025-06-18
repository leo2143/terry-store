<?PHP
require_once '../../functions/Autoload.php';


$postData = $_POST;
$fileData = $_FILES;




try {

} catch (Exception $e) {
    die("no se pudo eliminar comentario");
}
header('Location: ../index.php?page=admin_comments');
