<?PHP

class Checkout
{
    /**
     * Registra una nueva compra y sus items en la base de datos
     * 
     * @param array $purchaseData ['user_id', 'purchase_date', 'total_amount'] 
     * @param array $cartItems [equipment_id => cantidad]
     * @return bool True si tuvo éxito
     */    public static function insert_checkout_data(array $purchaseData, array $cartItems)
    {

        // Insertar datos principales de la compra
        $query = "INSERT INTO purchases (`user_id`, `purchase_date`, `total_amount`) VALUES ( :user_id, :purchase_date, :total_amount)";
        $params = [
            'user_id' => $purchaseData['user_id'],
            'purchase_date' => $purchaseData['purchase_date'],
            'total_amount' => $purchaseData['total_amount']
        ];
        $purchaseId =  (new Connection())->insertBuilder($query, $params, true);



        // Insertar cada item del carrito en la tabla de relación
        foreach ($cartItems as $equipmentId => $quantity) {
            $query = "INSERT INTO equipment_purchase_items(`purchase_id`, `equipment_id`, `quantity`) VALUES ( :purchase_id, :equipment_id, :quantity)";
            $params = [
                'purchase_id' => $purchaseId,
                'equipment_id' => $equipmentId,
                'quantity' => $quantity
            ];
            (new Connection())->insertBuilder($query, $params,);
        }
        return true;
    }
}
