<?php

require_once "libs/dao.php";

/* 
usercod bigint AI PK 
username varchar(80) 
userpswd varchar(128) 
userfching datetime 
userpswdest char(3) 
userpswdexp datetime 
userest char(3) 
useractcod varchar(128) 
userpswdchg varchar(128) 
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
sexo_user varchar(3) */

function getAllUsuarios(){

    $sqlstr = "SELECT * FROM usuario;";
    $resulSet = array();
    $resulSet = obtenerRegistros($sqlstr);
    return $resulSet;
}

function getUsuarioById($usercod){
    $sqlstr = "SELECT * from usuario where usercod = %d;";
    return obtenerUnRegistro(sprintf($sqlstr, $usercod));
}

function getUsuariosPorFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM usuario where usercod LIKE '%d' Or `usertipo` LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function updateUsuario($username, $nombre_user, $apellido_user, $fecha_nacimiento_user, $numero_identidad_user, $direccion_residencia_user, $telefono_user1, $telefono_user2, 
$email_user, $ciudad_user, $sexo_user, $userest, $usertipo, $usercod){
    $updsql = "UPDATE `usuario`SET`username`= '%s', `nombre_user`='%s', `apellido_user`= '%s', `fecha_nacimiento_user`='%s', `numer_identidad_user`='%s', 
    `direccion_residencia_user`='%s', `telefono_user1`= '%s', `telefono_user2`='%s', `email_user`= '%s', `ciudad_user`= '%s', `sexo_user`='%s',`userest`= '%s',
     `usertipo`='%s' WHERE `usercod` = %d;";

    return ejecutarNonQuery(
        sprintf( 
            $updsql,
            $username,  
            $nombre_user, 
            $apellido_user, 
            $fecha_nacimiento_user,  
            $numero_identidad_user,  
            $direccion_residencia_user, 
            $telefono_user1, 
            $telefono_user2, 
            $email_user,  
            $ciudad_user, 
            $sexo_user, 
            $userest, 
            $usertipo,
            $usercod
        )
    );
}

function deleteUsuario($usercod){
    return ejecutarnonQuery(sprintf("DELETE from usuario where usercod = %d;", $usercod));
}

?>
