<?PHP
class Images
{

    public static function uploadImage(string $directory, array $folderData): mixed
    {

        $og_name = (explode(".", $folderData["name"]));
        $extension = end($og_name);
        $fileName = time() . ".$extension";
        $fileUpload = move_uploaded_file($folderData["tmp_name"], "$directory/$fileName");
        if (!$fileUpload) {
            throw new Exception("No se pudo subir la imagen");
        } else {
            return $fileName;
        }
    }


    public static function deleteImage($file): bool
    {

        if (file_exists($file)) {
            echo "entro aca";
            $file_delete = unlink($file);
            if (!$file_delete) {
                throw new Exception("no se pudo eliminar la imagen");
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}
