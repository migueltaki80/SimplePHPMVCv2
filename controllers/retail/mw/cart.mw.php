<?php


require_once "models/mtn/productos.model.php";

function runCartMW()
{
    $cartEntries = 0;
    $cartAnonUniqueID = '';
    if (isset($_SESSION["cart_anon_uid"])) {
        $cartAnonUniqueID = $_SESSION["cart_anon_uid"];
    }
    if (mw_estaLogueado()) {
        // Si existe un $carNonUniqueID signigica que hay un carretilla
        //    Primero sacamos si tiene productos
        //    si tiene producto pasarlo a la carretilla autenticada
        //    borrar de la carretilla no auntenticada
        //    eliminar el código de
        // sino
        //     estraer los productos de la carretilla autenticada.
        // endif
        $usuario = $_SESSION["userLogged"];
        if ($cartAnonUniqueID !== '') {
            $tmpAnonCart = getCartProductsData($cartAnonUniqueID);
            if ($tmpAnonCart > 0) {
                passAnonCartToCart($cartAnonUniqueID, $usuario);
                unset($_SESSION["cart_anon_uid"]);
            }
        }
        $cartEntries = getCartProducts($usuario);
    } else {
        if ($cartAnonUniqueID !== '') {
            $cartEntries = getCartProductsData($cartAnonUniqueID);
        }
    }
    addToContext("cartEntries", $cartEntries);
}
// Correr el MiddleWare
runCartMW();

?>