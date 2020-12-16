<?php

require_once "libs/dao.php";


function getAllProductos(){

$sqlstr = "SELECT * FROM productos;";
$resultSet = array();
$resultSet = obtenerRegistros($sqlstr);
return $resultSet;
}

function getProductoPorFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM productos where codprd LIKE %d or bcdprd LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function addNewProducto($bcdprd, $descripcionprd, $estadoprd, $ldscprd, $precioprd, $sdscprd, $skuprd, $stkprd, $typprd, $urlprd, $urlthbprd){
    $inssql = " INSERT INTO productos (bcdprd, dscprd, estprd, ldscprd, prcprd, sdscprd, skuprd, stkprd, typprd, urlprd, urlthbprd)
    VALUES ('%s', '%s', '%s', '%s', '%d', '%s', '%s', '%d', '%s', '%s', '%s');
    return ejecutarNonQuery(sprintf($inssql, $bcdprd, $descripcionprd, $estadoprd, $ldscprd, $precioprd, $sdscprd, $skuprd, $stkprd, $typprd, $urlprd, $urlthbprd));
}

function updateProducto($bcdprd, $descripcionprd, $estadoprd, $ldscprd, $precioprd, $sdscprd, $skuprd, $stkprd, $typprd, $urlprd, $urlthbprd, $codprd){
    $updsql = "UPDATE 'productos' SET 'bcdprd' = '%s', 'dscprd' = '%s', 'estprd' = '%s', 'ldscprd' = '%s', 'prcprd' = '%d', 'sdscprd' = '%s', 'skuprd' = '%s', 'stkprd' = '%d', 'typprd' = '%s', 'urlprd' = '%s', 'urlthbprd' = '%s' WHERE 'codprd' = %d;";
    return ejecutarNonQuery(sprintf($updsql, $catename, $catestatus, $catecode));
}

function deleteProducto($codprd){
    $delsql = "DELETE FROM 'productos' WHERE codprd = %d;";
    return ejecutarNonQuery(sprintf($delsql, $codprd));
}

?>