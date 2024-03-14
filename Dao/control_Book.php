<?php
require_once "pdo.php";

function show_all_book()
{
    $sql = "SELECT * FROM `sach` JOIN `tacgia` ON sach.id_tac_gia = tacgia.id_tac_gia ORDER BY `id` ASC";
    return pdo_query($sql);
}

function show_all_tac_gia()
{
    $sql = "SELECT * FROM `tacgia` ORDER BY `id_tac_gia` ASC";
    return pdo_query($sql);
}

function add_book($tieude, $gia, $mota, $img_book, $tacgia)
{
    $sql = "INSERT INTO `sach`( `tieu_de`, `hinh_anh`, `gia`, `id_tac_gia`, `mota`) 
   VALUES ('$tieude','$img_book','$gia','$tacgia','$mota')";
    return pdo_execute($sql);
}

function delete_book($id)
{
    $sql = "DELETE FROM `sach` WHERE `id` = '$id'";
    return pdo_execute($sql);
}
function select_one($id)
{
    $sql = "SELECT * FROM `sach` WHERE `id` = '$id'";
    return pdo_query_one($sql);
}

function update_book($id, $tieude, $gia, $mota, $img_book, $tacgia)
{
    if ($img_book !== "") {
        $sql = "UPDATE `sach` 
        SET 
        `tieu_de`='$tieude',
        `hinh_anh`='$img_book',
        `gia`='$gia',
        `id_tac_gia`='$tacgia',
        `mota`='$mota' WHERE `id`= '$id'";
    } else {
        $sql = "UPDATE `sach` 
        SET 
        `tieu_de`='$tieude',
        `gia`='$gia',
        `id_tac_gia`='$tacgia',
        `mota`='$mota' WHERE `id`= '$id'";
    }

    return pdo_execute($sql);
}
