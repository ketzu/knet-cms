<?php
$title = "Ketzu.net";

$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
?>

<?php include "templates/header.php"; ?>

<?php include "templates/navbar.php"; ?>

<?php
switch($page)
{
    case "projects":
        include "views/projects.php";
        break;
    case "science":
        include "views/science.php";
        break;
    case "photography":
        include "views/photography.php";
        break;
    default:
        include "views/home.php";
        break;
}

?>

<?php include "templates/footer.php"; ?>
