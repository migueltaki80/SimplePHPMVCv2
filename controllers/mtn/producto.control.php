<?php
require_once "models/mtn/productos.model.php";

function run(){
    $viewDate = array();
    $viewData["mode"] = "";
    $viewData["modedsc"]= "";
    $viewData["codprd"] = 0;
    $viewData["dscprd"] = "";
    $viewData["sdscprd"] = "";
    $viewData["skuprd"] = "";
    $viewData["bcdprd"] = "";
    $viewData["stkprd"] = 0;
    $viewData["prcprd"] = 0;
    $viewData["urlprd"] = "";
    $viewData["typprd"] = "HOM";
    $viewData["estprd"] = "ACT";

    $viewData["typprd_HOM"] = "selected";
    $viewData["typprd_ETC"] = "";
    $viewData["typprd_GME"] = "";
    $viewData["typprd_SFW"] = "";
    $viewData["typprd_OFC"] = "";
    $viewData["typprd_LBS"] = "";
    $viewData["typprd_MSC"] = "";

    $viewData["estprd_ACT"] = "selected";
    $viewData["estprd_INA"] = "";

    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    $viewData["xsstoken"] = "";

    $modedsc = array(
        "INS"=>"Nueva Producto",
        "UPD"=>"Actualizar Producto %s",
        "DEL"=>"Eliminar Producto %s",
        "DSP"=>"Detalle de la Producto %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["codprd"] = intval($_GET["codprd"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede Realizar esta operacion", "index.php?page=productos");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);

        if(!(isset($_SESSION["cln_csstoken"])&& $_SESSION["cln_csstoken"] = $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=productos");
            die();
        }

        switch($viewData["mode"]){
            case "INS":
                $result = addNewProducto($viewData["dscprd"],
                $viewData["sdscprd"],
                $viewData["skuprd"],
                $viewData["bcdprd"],
                $viewData["stkprd"],
                $viewData["typprd"],
                $viewData["prcprd"],
                $viewData["urlprd"],
                $viewData["estprd"]);
                if($result > 0){
                    redirectWithMessage("Guardado Exitosamente", "index.php?page=productos");
                }
            break;
            case "UPD":
                $result = updateProducto($viewData["dscprd"],$viewData["sdscprd"],$viewData["skuprd"],$viewData["bcdprd"],$viewData["stkprd"],$viewData["typprd"],$viewData["prcprd"],$viewData["urlprd"],$viewData["estprd"],$viewData["codprd"]);
                if($result > 0){
                    redirectWithMessage("Actualizado Exitosamente", "index.php?page=productos");
                }
            break;
            case "DEL":
                $result = deleteProducto($viewData["codprd"]);
                if($result > 0){
                    redirectWithMessage("Eliminado Exitosamente", "index.php?page=productos");
                    die();
                }
        }
    }

    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }
    else{
        $productoDBData = getProductoById($viewData["codprd"]);
        mergeFullArrayTo($productoDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["dscprd"]);

        $viewData["typprd_HOM"] = ($viewData["typprd"]=="HOM")?"selected":"";
        $viewData["typprd_ETC"] = ($viewData["typprd"]=="ETC")?"selected":"";
        $viewData["typprd_GME"] = ($viewData["typprd"]=="GME")?"selected":"";
        $viewData["typprd_SFW"] = ($viewData["typprd"]=="SFW")?"selected":"";
        $viewData["typprd_OFC"] = ($viewData["typprd"]=="OFC")?"selected":"";
        $viewData["typprd_LBS"] = ($viewData["typprd"]=="LBS")?"selected":"";
        $viewData["typprd_MSC"] = ($viewData["typprd"]=="MSC")?"selected":"";

        $viewData["estprd_ACT"] = ($viewData["estprd"]=="ACT")?"selected":"";
        $viewData["estprd_INA"] = ($viewData["estprd"]=="INA")?"selected":"";

        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Esta Seguro que desea Eliminar este Producto, Borrar todo los datos.";
        }
    }
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mtn/producto", $viewData);
}

run();

?>