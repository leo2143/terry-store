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
            $redirectTo = "equipments";
            $redirectTranslate = "el equipamiento";

            $equipment = Equipment::getById($id);
            Equipment::delete($id);
            $comments = Comment::getByEquipmentId($equipment->getId());
            foreach ($comments as $comment) {
                Images::deleteImage("../../images/icons/" . $comment->getProfileImage());
            }
            Images::deleteImage("../../images/items/" . $equipment->getImage());


            break;
        case 'Categories':
            $redirectTo = "categories";
            $redirectTranslate = "la categoria";
            Categories::delete($id);

            break;
        case 'Rarities':
            $redirectTo = "rarities";
            $redirectTranslate = "la rareza";
            Rarities::delete($id);
            break;
        case 'Features':
            $redirectTo = "features";
            $redirectTranslate = "la carracteristica";
            Features::delete($id);
            break;
        case 'Comment':
            $redirectTo = "comments";
            $redirectTranslate = "el comentario";
            $comment = Comment::getById($id);
            Comment::delete($id);
            Images::deleteImage("../../images/icons/" . $comment->getProfileImage());


            break;
        default:
            throw new Exception("No existe el item a eliminar");
    }
} catch (Exception $e) {
    // Alert::add_alert("danger", message: "Ocurrió un error al intentar eliminar " . $redirectTranslate . ": " . $e->getMessage());

    Alert::add_alert("danger", message: "Ocurrio un error al intentar eliminar " . $redirectTranslate);
}
Alert::add_alert("success", message: "Se elimino correctamente " . $redirectTranslate);

header('Location: ../index.php?page=admin_' . $redirectTo);
