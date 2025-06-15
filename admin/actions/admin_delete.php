<?PHP
require_once '../../class/Equipment.php';
require_once '../../class/Categories.php';
require_once '../../class/Rarities.php';
require_once '../../class/Features.php';
require_once '../../class/Comment.php';
require_once '../../class/Connection.php';

$postData = $_POST;

try {

    $id = $postData["id"] ?? 0;
    $redirectTo;
    $entity = $postData["entitie"] ?? null;
    switch ($entity) {
        case 'Equipment':
            Equipment::delete($id);
            $redirectTo = "equipment";
            break;
        case 'Categories':
            Categories::delete($id);
            $redirectTo = "categories";

            break;
        case 'Rarities':
            Rarities::delete($id);
            $redirectTo = "rarities";

            break;
        case 'Features':
            Features::delete($id);
            $redirectTo = "features";

            break;
        case 'Comment':
            Comment::delete($id);
            $redirectTo = "comments";

            break;
        default:
            throw new Exception("No existe el item a eliminar");
    }
} catch (Exception $e) {

    die($e);
}
header('Location: ../index.php?page=admin_' . $redirectTo);
