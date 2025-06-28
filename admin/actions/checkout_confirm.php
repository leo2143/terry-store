<?php
require_once '../../functions/Autoload.php';



$items = Cart::getCart();
$userID = $_SESSION['loggedIn']['user_id'] ?? false;

try {
    if ($userID) {
        // Preparar datos de la compra
        $purchaseData = [
            "user_id" => $userID,
            "purchase_date" => date("Y-m-d"),  // Corregido formato de fecha (Y mayúscula para año completo)
            "total_amount" => Cart::totalPrice()
        ];

        // Preparar detalle del Cart
        $cartItems = [];
        foreach ($items as $equipmentId => $item) {
            $cartItems[$equipmentId] = $item['quantity'];
        }

        // Procesar el checkout
        $checkoutSuccess = Checkout::insert_checkout_data($purchaseData, $cartItems);

        echo "<pre>";
        echo $checkoutSuccess;
        echo "<pre/>";

        if ($checkoutSuccess) {
            // Limpiar Cart solo si la compra fue exitosa
            Cart::clearItem();

            Alert::add_Alert('success', "Su compra se realizó correctamente, nos estaremos contactando por mail para pactar el envío");
            header('Location: ../../index.php?page=user-panel');
        } else {
            throw new Exception("Falló la inserción en la base de datos");
        }
    } else {
        Alert::add_Alert('warning', "Su sesión expiró. Por favor, ingrese nuevamente");
        header('Location: /index.php?page=login');
    }
} catch (Exception $e) {
    Alert::add_Alert('danger', "No se pudo finalizar la compra. Por favor, intente nuevamente.");
    header('Location: ../../index.php?page=cart');
}
