<?PHP
class cart
{


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
}
