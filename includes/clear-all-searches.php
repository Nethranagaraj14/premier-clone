<?php

include 'db.php';

mysqli_query(
    $conn,
    "DELETE FROM saved_searches"
);

header("Location: ../index.php");
exit;