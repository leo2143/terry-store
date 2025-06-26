<?PHP
class cart
{

    /**
     * Agrega un producto al carrito de compras.
     *
     * @param int $productId ID del producto a agregar.
     * @param int $quantity Cantidad del producto.
     *
     * @return void
     */

    public static function addItem(int $productId, int $quantity)
    {

        $itemData = Equipment::getById($productId);
        if ($itemData) {

            $_SESSION["cart"][$productId] = [

                "product" => $itemData->getName(),
                "image" => $itemData->getImage(),
                "price" => $itemData->getPrice(),
                "quantity" => $quantity,
            ];
        }
    }

    /**
     * Obtiene todos los productos del carrito.
     *
     * @return array Arreglo con los productos actuales del carrito.
     *               Cada producto contiene: product, image, price, quantity.
     */
    public static function getCart(): array
    {
        if (!empty($_SESSION["cart"])) {
            return $_SESSION["cart"];
        } else {
            return [];
        }
    }

    /**
     * Calcula el precio total de todos los productos en el carrito.
     *
     * @return float Total acumulado (precio * cantidad de cada producto).
     */
    public static function totalPrice(): float
    {
        $total = 0;
        if (!empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $item) {
                $total += $item["price"] * $item["quantity"];
            }
        }
        return $total;
    }

    /**
     * Elimina un producto específico del carrito.
     *
     * @param mixed $productId ID del producto a eliminar.
     *
     * @return void
     */
    public static function removeItem($productId)
    {
        if (isset($_SESSION["cart"][$productId])) {
            unset($_SESSION["cart"][$productId]);
        }
    }
    /**
     * Vacía completamente el carrito de compras.
     *
     * @return void
     */
    public static function clearItem()
    {
        $_SESSION["cart"] = [];
    }
    /**
     * Actualiza las cantidades de productos en el carrito.
     *
     * @param array $items Arreglo asociativo con el ID del producto como clave
     *                     y la nueva cantidad como valor.
     *
     * @return void
     */
    public static function updateItems(array $items)
    {

        foreach ($items as $key => $value) {
            if (isset($_SESSION["cart"][$key])) {
                $_SESSION["cart"][$key]["quantity"] = $value;
            }
        }
    }
}
