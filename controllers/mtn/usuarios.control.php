<?php

require_once "models/mtn/usuarios.model.php";

function run(){
    $viewData = array();
    $viewData["cln_txtfilter"] = "";
    if(isset($_SESSION["cln_txtfilter"])){
        $viewData["cln_txtfilter"] = $_SESSION["cln_txtfilter"];
    }

    if(isset($_POST["btnFiltrar"])){
        mergeFullArrayTo($_POST, $viewData);
        $_SESSION["cln_txtfilter"] = $viewData["cln_txtfilter"];
    }
    if($viewData["cln_txtfilter"] === ""){
        $viewData["usuarios"] = getAllUsuarios();
    }
    else{
        $viewData["usuarios"] = getUsuariosPorFiltro($viewData["cln_txtfilter"]);
    }
    
    renderizar("mtn/usuarios", $viewData);

}
run();

?>