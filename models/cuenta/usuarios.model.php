<?php

require_once "libs/dao.php";


function addNewCuenta($username, $userpswd, $fchingreso, $nombre_user, $apellido_user, $fecha_nacimiento_user, $numero_identidad_user,
 $direccion_residencia_user, $telefono_user1, $telefono_user2, $email_user, $ciudad_user, $sexo_user){
    $inssql = "INSERT INTO `usuario`(`username`,`userpswd`,`userfching`,`userpswdest`,`userpswdexp`,`userest`,`useractcod`,`userpswdchg`,`usertipo`,`nombre_user`,
`apellido_user`,`fecha_nacimiento_user`,`numero_identidad_user`,`direccion_residencia_user`,`telefono_user1`,`telefono_user2`,`email_user`,`ciudad_user`,
`sexo_user`)VALUES('%s','%s',now(),'VGT',NULL,'ACT','',NULL,'SYN','Moises','Bustillo','1996-08-29','%s','%s','%s',
'%s','%s','Tegucigalpa','MAS');";
    return ejecutarNonQuery(sprintf($inssql, $username, $userpswd,$fchingreso,$nombre_user, $apellido_user, $fecha_nacimiento_user, 
    $numero_identidad_user, $direccion_residencia_user, $telefono_user1, $telefono_user2, $email_user, $ciudad_user, $sexo_user));
}



?> 