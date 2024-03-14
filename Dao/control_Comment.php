<?php
require_once "pdo.php";

function comment_insert($id_client, $id_product, $content_comment, $date_comment)
{
    $sql = "INSERT INTO `comment`(`content_comment`, `id_client`, `id_product`, `date_comment`) 
    VALUES ('$content_comment','$id_client','$id_product','$date_comment')";
    pdo_execute($sql);
}

function comment_delete($id_comment)
{
    $sql = "DELETE FROM `comment` WHERE id_comment = '$id_comment'";
    if (is_array($id_comment)) {
        foreach ($id_comment as $comment) {
            pdo_execute($sql, $comment);
        }
    } else {
        pdo_execute($sql);
    }
}

function show_comment()
{
    $sql = "SELECT * FROM `comment` ORDER BY `date_comment` DESC";
    return pdo_query($sql);
}

function show_comment_by_id($id_comment)
{
    $sql = "SELECT * FROM `comment` WHERE `id_comment` = ?";
    return pdo_query($sql, $id_comment);
}

function comment_exists($id_comment)
{
    $sql = "SELECT * FROM `comment` WHERE `id_comment` = ?";
    return pdo_query_value($sql, $id_comment) > 0;
}

function comment_select_by_product($id_product)
{
    $sql = "SELECT C.*, P.name_product , Cl.name_client
          FROM comment C
          JOiN clients Cl ON Cl.id_client = C.id_client
          JOIN products P ON C.id_product = P.id_product
          WHERE C.id_product = $id_product
          ORDER BY date_comment DESC";
    return pdo_query($sql);
}
