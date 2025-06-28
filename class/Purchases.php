<?php
// classes/Purchases.php
class Purchases
{


    /**
     * Devuelve las compras de un usuario en particular
     * @param int $userId El ID del usuario a mostrar
     * @return array
     */
    public static function get_purchases_by_user(int $userId): array
    {
        $query = "
    SELECT
        p.id,
        p.purchase_date as purchase_date,
        p.total_amount,
        GROUP_CONCAT(CONCAT(epi.quantity, 'x ', e.name) SEPARATOR ', ') as items_detail
    FROM purchases p
    JOIN equipment_purchase_items epi ON p.id = epi.purchase_id
    JOIN equipments e ON epi.equipment_id = e.id
    WHERE p.user_id = :user_id 
    GROUP BY p.id
    ORDER BY p.purchase_date DESC";

        $params = ['user_id' => $userId];

        // Usamos stdClass::class y complexClass=true para obtener resultados como array asociativo
        $result = (new Connection())->selectBuilder($query, stdClass::class, $params, true);

        return $result->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }
}
