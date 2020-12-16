<?php

/*usercod bigint AI PK 
username varchar(80) 
userpswd varchar(128) 
userfching datetime 

userpswdest char(3) 

userest char(3)  

usertipo char(3) 
nombre_user varchar(40) 
apellido_user varchar(40) 
fecha_nacimiento_user date 
numero_identidad_user varchar(20) 
direccion_residencia_user varchar(45) 
telefono_user1 varchar(10) 
telefono_user2 varchar(10) 
email_user varchar(80) 
ciudad_user varchar(40) 
sexo_user varchar(3)*/

require_once "models/cuenta/usuarios.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["usercod"] = 0;
    $viewData["username"] = "";
    $viewData["userfching"] = "";
    $viewData["userpswd"] = "";
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


    $viewData["xsstoken"] = "";

    $modedsc = array(
        "INS"=>"Nuevo Cliente"
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
            case "INS":
                $fchingreso = time();
                $pswdSalted = "";
                if($fchingreso % 2 === 0){
                    $pswdSalted = $viewData["userpswd"] . $fchingreso;
                }else{
                    $pswdSalted = $fchingreso . $viewData["userpswd"];
                }
                $pswdSalted = hash("sha256", $pswdSalted);
                $result = addNewCuenta(
                    $viewData["username"],
                    $pswdSalted,
                    $fchingreso,
                    $viewData["nombre_user"],
                    $viewData["apellido_user"],
                    $viewData["fecha_nacimiento_user"],
                    $viewData["numero_identidad_user"],
                    $viewData["direccion_residencia_user"],
                    $viewData["telefono_user1"],
                    $viewData["telefono_user2"],
                    $viewData["email_user"],
                    $viewData["ciudad_user"],
                    $viewData["sexo_user"]
            );
            if($result > 0){
                redirectWithMessage("Usuario Guardado Exitosamente", "index.php?page=login");
            }
            break;
        }
    }
    
    //Crear un token unico
    //Guardar en sesion ese token
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("cuentas/cliente", $viewData);

}

run();

?>