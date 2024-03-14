<?php
require_once "pdo.php";

function statistic_product()
{
    $sql = "SELECT C.id_commodity, C.name_commodity,
        COUNT(*) AS quantity,
        MIN(P.price_product) AS price_min,
        MAX(P.price_product) AS price_max,
        AVG(P.price_product) AS price_avg
    FROM products P
    JOIN commodity C ON P.id_commodity = C.id_commodity
    GROUP BY C.id_commodity, C.name_commodity";
    return pdo_query($sql);
}

function statistic_comment()
{
    $sql = "SELECT 
        P.id_product,
        P.name_product,
        COUNT(*) AS quantity,
        MIN(Comme.date_comment) AS oldest_comment_date,
        MAX(Comme.date_comment) AS newest_comment_date
    FROM comment Comme
    JOIN products P ON P.id_product = Comme.id_product
    GROUP BY P.id_product, P.name_product 
    HAVING quantity > 0";

    return pdo_query($sql);
}
