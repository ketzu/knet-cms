<?php
require_once "util/require_login.php";

$title = "Admin Panel";

$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
?>

<?php include "templates/header.php"; ?>

<?php
switch($page)
{
    case "projects":
        include "admin/projects.php";
        break;
    default:
        include "admin/science.php";
        break;
}

?>