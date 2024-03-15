<!--  -->
<img src="<?= $CONTENT_URL; ?>/Images/client/<?= isset($_SESSION['user']) ? $_SESSION['user']['img_client'] : "user.png" ?>" class="user-pic" onclick="toggleMenu()">
<div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">

        <div class="user-infor">
            <img src="<?= $CONTENT_URL; ?>/Images/client/<?= isset($_SESSION['user']['img_client']) ? $_SESSION['user']['img_client'] : "user.png" ?>" alt="">
            <h3><?= isset($_SESSION['user']['name_client']) ? $_SESSION['user']['name_client'] : "" ?> </h3>
        </div>
        <hr>

        <?php
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] === "boss") {
                echo
                '<a href="http://localhost/BOX_PHP/Fromsorfware/Admin/Main/" class="sub-menu-link">
                <p>Admin</p>
                <span>></span>
                </a>';
            }
        }
        ?>


        <?php
        if (isset($_SESSION['user'])) {
            echo '<a href="../Main/index.php?changePs" class="sub-menu-link">
            <p>Change Password
            </p>
            <span>></span>
            </a>
           ';
        }
        ?>

        <a href="../Main/index.php?login" class="sub-menu-link">
            <p>Log in </p>
            <span>></span>
        </a>
        <?php
        if (isset($_SESSION['user'])) {
            echo '<a href="../Main/index.php?logout" class="sub-menu-link">
            <p>Log out</p>
            <span>></span>
            </a>';
        }
        ?>

    </div>
</div>