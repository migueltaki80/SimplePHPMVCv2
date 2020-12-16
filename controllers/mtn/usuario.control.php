<?php

require_once "models/mtn/usuarios.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["usercod"] = 0;
    $viewData["username"] ="";
    $viewData["nombre_user"] = "";
    $viewData["apellido_user"] = "";
    $viewData["fecha_nacimiento_user"] = "";
    
    $viewData["numero_identidad_user"] = "";
    $viewData["direccion_residencia_user"] = "";
    $viewData["telefono_user1"] = "";
    $viewData["telefono_user2"] = "";
    $viewData["email_user"] = "";
    $viewData["ciudad_user"] = "";
    $viewData["sexo_user"] = "MAS";
    $viewData["sexo_user_MAS"] = "selected";
    $viewData["sexo_user_FEM"] = "";
    $viewData["userest"] = "ACT"; 
    $viewData["estado_user_ACT"] = "selected";
    $viewData["estado_user_INA"] = "";
    $viewData["usertipo"] = "SYN";//Cliente CTL, Administrador ADM, vendedor VDR, cliente normal SYN
    $viewData["tipo_user_SYN"] = "selected";
    $viewData["tipo_user_ADM"] = "";
    $viewData["tipo_user_CLT"] = "";
    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    $viewData["xsstoken"] = "";

    $modedsc = array(
        "UPD"=>"Actualizar Usuario %s",
        "DEL"=>"Eliminar Usuario %s",
        "DSP"=>"Detalle del Usuario %s"
    );

    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["usercod"] = intval($_GET["usercod"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=home");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST, $viewData);
        //Verificacion de XSS Token
        if(!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] = $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.", "index.php?page=home");
            die();
        }
        switch ($viewData["mode"]){
            case "UPD":
                $result = updateUsuario(
                $viewData["username"],
                $viewData["nombre_user"],
                $viewData["apellido_user"],
                $viewData["fecha_nacimiento_user"],
                $viewData["numero_identidad_user"],
                $viewData["direccion_residencia_user"],
                $viewData["telefono_user1"],
                $viewData["telefono_user2"],
                $viewData["email_user"],
                $viewData["ciudad_user"],
                $viewData["sexo_user"],
                $viewData["userest"],
                $viewData["usertipo"],
                $viewData["usercod"]
            );
            if($result > 0){
                redirectWithMessage("Actualizado Exitosamente", "index.php?page=usuarios");
            }
            break;
            case 'DEL':
                $result = deleteCliente($viewData["usercod"]);
                if($result > 0){
                    redirectWithMessage("Eliminado Exitosamente", "index.php?page=usuarios");
                    die();
                }
            break;
        }
    }
    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }else{
        $usuarioDBData = getUsuarioById($viewData["usercod"]);
        mergeFullArrayTo($usuarioDBData, $viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]], $viewData["nombre_user"]);
        $viewData["sexo_user_FEM"] = ($viewData["sexo_user"]=="FEM")?"selected":"";
        $viewData["sexo_user_MAS"] = ($viewData["sexo_user"]=="MAS")?"selected":"";
        $viewData["estado_user_ACT"] = ($viewData["userest"]=="ACT")?"selected":"";
        $viewData["estado_user_ACT"] = ($viewData["userest"]=="INA")?"selected":"";
        $viewData["tipo_user_SYN"] = ($viewData["usertipo"]=="SYN")?"selected":"";
        $viewData["tipo_user_ADM"] = ($viewData["usertipo"]=="ADM")?"selected":"";
        $viewData["tipo_user_CLT"] = ($viewData["usertipo"]=="CLT")?"selected":"";
        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Esta seguro que desea Eliminar este registro, Borrara todo los datos.";
        }

    }
    
    //Crear un token unico
    //Guardar en sesion ese token
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mtn/usuario", $viewData);

}

run();

?>