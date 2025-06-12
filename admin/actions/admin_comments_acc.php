<?PHP
$postData = $_POST;
$fileData = $_FILES;

print_r($postData);

// try {
//     $comments = Comment::create($postData['name']);
// } catch (Exception $e) {
//     die("no se pudo cargar");
// }
// header('Location: ../index.php?sec=admin_comments');
