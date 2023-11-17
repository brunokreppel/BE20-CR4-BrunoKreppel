<?php
// same delete thing we did in the livecoding nothing special here...

require_once 'components/db_Connection.php';

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM `books` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
}

$sql = "DELETE FROM `books` WHERE `id` = $id";
mysqli_query($conn, $sql);

mysqli_close($conn);
header("Location: index.php");
?>
