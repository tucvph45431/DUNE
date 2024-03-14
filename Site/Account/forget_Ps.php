<?php
require "../../global.php";
require "../../Dao/control_Client.php";

extract($_REQUEST);


if (exist_param("btn_forget_Ps")) {
    $user = show_client_by_email($email);
    if ($user) {
        if ($user['email'] != $email) {
            $MESSAGE = "Error address email is incorrect";
        } else {
            $MESSAGE = "Your password is : " . $user['password'];
            $VIEW_NAME = "Account/login_form.php";
            global $email, $password;
        }
    } else {
        $MESSAGE = "Your email is incorrect";
    }
}


$VIEW_NAME = "Account/forget_Ps_form.php";
require "../layout.php";
