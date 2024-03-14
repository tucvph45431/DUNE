<?php

require "../../global.php";
require "../../Dao/pdo.php";
require "../../Dao/control_Commodity.php";
require "../../Dao/control_Product.php";
extract($_REQUEST);
if (exist_param("id_commodity")) {
    $products = select_product_by_commodity($id_commodity);
} elseif (exist_param("kyw")) {
    $kwy = isset($_POST['kyw']) ? $_POST['kyw'] : '';
    $list_Commodity = show_commodity();
    $products = show_product($kwy);
} else {
    $products = select_all_product();
}

$list_Commodity = show_commodity();
$VIEW_NAME = "list-ui.php";
require "../layout.php";
