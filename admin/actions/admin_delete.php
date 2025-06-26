<?PHP
require_once '../../functions/Autoload.php';


$postData = $_POST;

try {

    $id = $postData["id"] ?? 0;
    $redirectTo;
    $redirectTranslate;

    $entity = $postData["entitie"] ?? null;
    switch ($entity) {
        case 'Equipment':
            $equipment = Equipment::getById($id);
            Equipment::delete($id);
            $comments = Comment::getByEquipmentId($equipment->getId());
            foreach ($comments as $comment) {
                Images::deleteImage("../../images/icons/" . $comment->getProfileImage());
            }
            Images::deleteImage("../../images/items/" . $equipment->getImage());

            $redirectTo = "equipments";
            $redirectTranslate = "el equipamiento";

            break;
        case 'Categories':
            Categories::delete($id);
            $redirectTo = "categories";
            $redirectTranslate = "la categoria";

            break;
        case 'Rarities':
            Rarities::delete($id);
            $redirectTo = "rarities";
            $redirectTranslate = "la rareza";

            break;
        case 'Features':
            Features::delete($id);
            $redirectTo = "features";
            $redirectTranslate = "la carracteristica";

            break;
        case 'Comment':
            $comment = Comment::getById($id);
            Comment::delete($id);
            Images::deleteImage("../../images/icons/" . $comment->getProfileImage());

            $redirectTo = "comments";
            $redirectTranslate = "el comentario";
            break;
        default:
            throw new Exception("No existe el item a eliminar");
    }
} catch (Exception $e) {

    Alert::add_alert("danger", message: "Ocurrio un error al intentar eliminar " . $redirectTranslate);
}
Alert::add_alert("success", message: "Se elimino correctamente " . $redirectTranslate);

header('Location: ../index.php?page=admin_' . $redirectTo);
