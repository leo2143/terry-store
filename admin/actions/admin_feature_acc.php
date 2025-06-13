<?PHP
require_once '../../class/Comment.php';
require_once '../../class/Connection.php';

$postData = $_POST;
$fileData = $_FILES;

print_r($postData);
print_r($fileData);

//validar si viene un campo id, si viene un campo id se ejecuta el update


try {
    Comment::create(1, $postData['username'], "revall", $postData['content'], $postData['rating'], date("Y/m/d"));
} catch (Exception $e) {
    die("no se pudo cargar");
}
header('Location: ../index.php?sec=admin_comments');
