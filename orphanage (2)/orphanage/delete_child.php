<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM children WHERE id=$id");
    header("Location: index.php?delete_success=1");
    exit();
} else {
    header("Location: index.php");
}
?>
