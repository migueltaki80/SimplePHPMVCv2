<?php


require_once "models/mtn/productos.model.php";

function run()
{
    $usuario = $_SESSION["userCode"];
    $arrDataView = array();
    $arrDataView = getAuthCartDetail($usuario);
    renderizar("retail/cartauth", $arrDataView);
}
// Correr el controlador
run();

?>