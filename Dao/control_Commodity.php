<?php
require_once "pdo.php";

function show_commodity()
{
    $sql = "SELECT * FROM `commodity` ORDER BY `id_commodity` ASC";
    $list_commodity =  pdo_query($sql);
    return $list_commodity;
}

function show_commodity_one($id_type)
{
    $sql = "SELECT * FROM `commodity` WHERE `id_commodity` =" . $id_type;
    $dm = pdo_query_one($sql);
    return $dm;
}

function insert_commodity($name_type)
{
    $sql = "INSERT INTO `commodity`(`name_commodity`)
    VALUES ('$name_type')";
    pdo_execute($sql);
}

function delete_commodity($id_type)
{
    $sql = "DELETE FROM `commodity` WHERE  `id_commodity` =" . $id_type;
    pdo_execute($sql);
}

function update_commodity_one($id_type, $name_type)
{
    $sql = "UPDATE `commodity` SET `name_commodity`='$name_type' WHERE `id_commodity`='$id_type'";
    pdo_execute($sql);
}

function check_name($name)
{
    $sql = "SELECT * FROM `commodity` WHERE `name_commodity` = '$name'";
    return pdo_check_data($sql);
}
