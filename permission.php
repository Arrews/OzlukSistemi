<?php
session_start();

function check_admin_perm() {
    return isset($_SESSION['yetki']) && $_SESSION['yetki'] > 0;
}

?>