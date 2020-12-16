<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @author   Luis Fernando Gomez Figueroa <lgomezf16@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();

require_once "libs/utilities.php";

$pageRequest = "home";

if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}

//Incorporando los midlewares son codigos que se deben ejecutar
//Siempre
require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";
require_once "controllers/retail/mw/cart.mw.php";

// aqui no se toca jajaja la funcion de este index es
// llamar al controlador adecuado para manejar el
// index.php?page=modulo

    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "home":
    //llamar al controlador
    include_once "controllers/home.control.php";
    die();
case "sobre":
    include_once "controllers/sobre.control.php";
    die();
case "categoria":
    include_once "controllers/categoria.control.php";
    die();
case "login":
    include_once "controllers/security/login.control.php";
    die();
case "logout":
    include_once "controllers/security/logout.control.php";
    die();
case "setup":
    include_once "setup.php";
    die();
case "newclient":
    include_once "controllers/cuentas/newclient.control.php";
    die();
case "productos":
    include_once "controllers/mtn/productos.control.php";
    die();
case "producto":
    include_once "controllers/mtn/producto.control.php";
    die();
case "usuarios":
    include_once "controllers/mtn/usuarios.control.php";
    die();
case "usuario":
    include_once "controllers/mtn/usuario.control.php";
    die();

case "addtocart":
    include_once "controllers/retail/addtocart.control.php";
    die();
case "rmvtocart":
    include_once "controllers/retail/rmvtocart.control.php";
    die();
case "cartanon":
    include_once "controllers/retail/cartanon.control.php";
    die();
case "rmvallcart":
    include_once "controllers/retail/rmvAllCart.control.php";
    die();
case "catalogo":
    include_once "controllers/catalogo.control.php";
    die();
}

//Este switch se encarga de todo el enrutamiento que ocupa login
$logged = mw_estaLogueado();
if ($logged) {
    addToContext("layoutFile", "verified_layout");
    include_once 'controllers/mw/autorizar.mw.php';
    if (!isAuthorized($pageRequest, $_SESSION["userCode"])) {
        include_once"controllers/notauth.control.php";
        die();
    }
    generarMenu($_SESSION["userCode"]);
}

require_once "controllers/mw/support.mw.php";
switch ($pageRequest) {
case "dashboard":
    ($logged)?
      include_once "controllers/dashboard.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "users":
    ($logged)?
      include_once "controllers/security/users.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "user":
    ($logged)?
      include_once "controllers/security/user.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "roles":
    ($logged)?
      include_once "controllers/security/roles.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "rol":
    ($logged)?
      include_once "controllers/security/rol.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programas":
    ($logged)?
      include_once "controllers/security/programas.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programa":
    ($logged)?
      include_once "controllers/security/programa.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "usuarios":
    ($logged)?
      include_once "controllers/mtn/usuarios.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "cartauth":
    ($logged) ?
      include_once "controllers/retail/cartauth.control.php" :
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "checkout":
    ($logged) ?
      include_once "controllers/retail/paypal/checkout.control.php" :
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "checkoutapr":
    ($logged) ?
      include_once "controllers/retail/paypal/checkoutapproved.control.php" :
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "checkoutcnl":
    ($logged) ?
      include_once "controllers/retail/paypal/checkoutcancel.control.php" :
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
}



addToContext("pageRequest", $pageRequest);
require_once "controllers/error.control.php";
