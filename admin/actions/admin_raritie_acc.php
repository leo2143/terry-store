<?PHP
require_once '../../class/Rarities.php';
require_once '../../class/Connection.php';

$postData = $_POST;
$fileData = $_FILES;

print_r($postData);
print_r($fileData);



try {
    Rarities::create($postData['name']);
} catch (Exception $e) {
    die("no se pudo cargar");
}
header('Location: ../index.php?page=admin_rarities');
