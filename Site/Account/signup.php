<?php
require '../../global.php';
require '../../Dao/control_Client.php';
extract($_REQUEST);

if (exist_param('register')) {

    // CHECK NAME //
    if (validateNameLength($name_client) !== true) {
        $MESSAGE = validateNameLength($name_client);
    }

    // VALIDATE PASSWORD //
    elseif (checkConfirmPassword($password, $confirmPassword) !== true) {
        $MESSAGE = checkConfirmPassword($password, $confirmPassword);
    }

    // VALIDATE EMAIL //
    elseif (validateEmail($email_client) !== true) {
        $MESSAGE = validateEmail($email_client);
    } else {
        $target_dir = "$IMAGE_DIR/client/";
        // ---------------- FUNCTION ------------------//
        $file_name = save_file('img_client', $target_dir);
        $img = $file_name ? $file_name : "user.png";
        try {
            insert_client($email_client, $password, $name_client, $img, $role, $active);
            $MESSAGE = "Successfully Registered";
        } catch (Exception $exc) {
            $MESSAGE = "Not Successfully Registered";
        }
    }
} else {
    global $email, $password, $confirmPassword, $name, $img, $role, $active;
}
$VIEW_NAME = "Account/signup_form.php";
require '../layout.php';
