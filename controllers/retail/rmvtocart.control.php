<?php

/**
 * PHP Version 7
 * Controlador de Controlador
 *
 * @category Controllers_RmvToCart
 * @package  Controllers\Controllers_RmvToCart
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @version CVS:1.0.0
 *
 * @link http://url.com
 */
 // Sección de requires
require_once "models/mtn/productos.model.php";
/**
 * Corre el Controlador
 *
 * @return void
 */
function run()
{
    $resultArray = array();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["codprd"])) {
        $codprd = intval($_GET["codprd"]);
        $cantidad = 1;
        $producto = obtenerUnProducto($codprd);
        if (count($producto) <= 0) {
              $resultArray["msg"] = "No se encontró producto";
              header('Content-Type: application/json');
              echo json_encode($resultArray);
              die();
        }
        $precio = $producto["prcprd"];
        if (mw_estaLogueado()) {
            // agregar a carretilla autenticada
            $resultArray["msg"] = "Eliminando a Carretilla Autenticada";
            $usuario = $_SESSION["userCode"];
            rmvCartAuth($codprd, $usuario, $cantidad);
            $resultArray["cartAmount"] = 1;// getCartProducts($usuario);
        } else {
            // agregar a carretilla no autenticada
            $cartAnonUniqueID = '';
            if (isset($_SESSION["cart_anon_uid"])) {
                $cartAnonUniqueID = $_SESSION["cart_anon_uid"];
            }
            if ($cartAnonUniqueID === '') {
                $cartAnonUniqueID = time() . random_int(1000, 9999);
            }
            $_SESSION["cart_anon_uid"] = $cartAnonUniqueID;
            $resultArray["msg"] = "Eliminado a Carretilla No Autenticada";
            rmvCartAnon($codprd, $cartAnonUniqueID, $cantidad, $precio);
            $resultArray["cartAmount"] = 1 ;//getCartProductsData($cartAnonUniqueID);
        }
    } else {
        $resultArray["msg"] = "Esta tratando de hacer al incorrecto";
    }
    header('Content-Type: application/json');
    echo json_encode($resultArray);
    die();
}
// Correr el controlador
run();

?>