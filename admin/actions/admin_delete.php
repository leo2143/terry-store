<?PHP
require_once '../../functions/Autoload.php';


$postData = $_POST;

try {

    $id = $postData["id"] ?? 0;
    $redirectTo;
    $entity = $postData["entitie"] ?? null;
    switch ($entity) {
        case 'Equipment':
            $equipment = Equipment::getById($id);
            Equipment::delete($id);
            Images::deleteImage("../../images/items/" . $equipment->getImage());

            $redirectTo = "equipments";
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
