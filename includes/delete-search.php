<?php

include 'db.php';

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    mysqli_query(
        $conn,
        "DELETE FROM saved_searches WHERE id = $id"
    );
}

header("Location: ../index.php");
exit;