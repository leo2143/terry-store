<?PHP
class Images
{

    /**
     * Sube una imagen al directorio especificado y retorna el nuevo nombre del archivo.
     *
     * @param string $directory Ruta del directorio donde se guardará la imagen.
     * @param array $folderData Datos del archivo proveniente del formulario ($_FILES).
     * @return string Nombre del archivo subido.
     * @throws Exception Si ocurre un error al subir la imagen.
     */
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

    /**
     * Elimina una imagen del sistema de archivos si existe.
     *
     * @param string $file Ruta completa del archivo a eliminar.
     * @return bool TRUE si se eliminó correctamente, FALSE si el archivo no existe.
     * @throws Exception Si ocurre un error al intentar eliminar el archivo.
     */
    /**
     * Clase encargada de manejar la subida y eliminación de archivos de imagen en el sistema.
     */

    public static function deleteImage($file): bool
    {
        if (file_exists($file)) {
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
