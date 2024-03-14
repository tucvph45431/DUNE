<?php
require_once "pdo.php";

function show_client()
{
    $sql = "SELECT * FROM `clients` order by id_client ASC";
    return pdo_query($sql);
}

function show_client_one($id_client)
{
    $sql = "SELECT * FROM `clients` WHERE `id_client` =" . $id_client;
    return pdo_query_one($sql);
}

function show_client_by_email($email)
{
    $sql = "SELECT * FROM `clients` WHERE `email` = '$email'";
    return pdo_query_one($sql);
}

function show_client_by_id($id_client)
{
    $sql = "SELECT * FROM `clients` WHERE `id_client` = '$id_client'";
    return pdo_query_one($sql);
}

function insert_client($email, $password, $name, $img, $role, $active)
{
    $sql = "INSERT INTO
    `clients`(`email`, `password`, `name_client`, `img_client`, `role`, `active`) 
    VALUES
    ('$email',
    '$password',
    '$name',
    '$img',
    '$role',
    '$active')";
    pdo_execute($sql);
}
function delete_client($id_client)
{
    $sql = "DELETE FROM `clients` WHERE id_client=" . $id_client;
    pdo_execute($sql);
}
function update_client_one($id_client, $email, $password, $name, $img, $role, $active)
{
    if ($img != "") {
        $sql = "UPDATE `clients` 
        SET 
        `email`='$email',
        `password`='$password',
        `name_client`='$name',
        `img_client`='$img',
        `role`='$role',
        `active`='$active' WHERE `id_client`='$id_client'";
    } else {
        $sql = "UPDATE `clients` 
        SET 
        `email`='$email',
        `password`='$password',
        `name_client`='$name',
        `role`='$role',
        `active`='$active' WHERE `id_client`='$id_client'";
    }
    pdo_execute($sql);
}



function email_exist($email)
{
    $sql = "SELECT * FROM `clients` WHERE `email` = ?";
    return pdo_check_data($sql, [$email]);
}


function select_client_by_id($id_client)
{
    $sql = "SELECT * FROM client WHERE id_client= " . $id_client;
    return pdo_query_one($sql);
}

function change_password_client($email, $new_password)
{
    $sql = "  UPDATE `clients` SET `password`='$new_password' WHERE `email`='$email'";
    pdo_execute($sql);
}


// ======================================== FUNCTION CHECK SIGN UP ======================================== // 

function validateNameLength($name_client)
{
    $minLen = 2;
    $maxLen = 50;

    $nameLength = strlen($name_client);

    if (empty($name_client)) {
        return "Name address is required.";
    }

    if ($nameLength < $minLen) {
        return "Name must be at least $minLen characters long.";
    }
    if ($nameLength > $maxLen) {
        return "Name must be less than $maxLen characters long.";
    }
    return true;
}

function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email address.";
    }

    if (empty($email)) {
        return "Email address is required.";
    }

    if (strlen($email) > 255) {
        return "Email address is too long.";
    }
    if (!email_exist($email)) {
        return "Email exists";
    }
    return true;
}

function checkConfirmPassword($password, $confirmPassword)
{
    if (empty($password) || empty($confirmPassword)) {
        return 'Password and confirm password fields are required.';
    }

    if (strlen($password) < 8) {
        return 'Password must be at least 8 characters long.';
    }

    if ($password !== $confirmPassword) {
        return 'Passwords do not match.';
    }
    return true;
}
