<?PHP
require_once '../../class/Categories.php';
require_once '../../class/Connection.php';

$postData = $_POST;
$fileData = $_FILES;

print_r($postData);
print_r($fileData);

//validar si viene un campo id, si viene un campo id se ejecuta el update


try {
    Categories::create($postData['name']);
} catch (Exception $e) {
    die("no se pudo cargar");
}
header('Location: ../index.php?page=admin_categories');
