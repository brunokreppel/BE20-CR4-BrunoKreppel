<?php
require_once 'components/db_Connection.php';

$sql = "SELECT * FROM `books`";
$result = mysqli_query($conn, $sql);
$cards = "";

// loop thingy to display all the entrys in my Databse
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "
        <div class='p-2 d-flex justify-content-center'>
            <div class='card position-relative h-100 shadow-md' style='background-color: #FDF9F9; width: 22rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                <img src='{$row['image']}' class='card-img-top object-fit-cover' alt='...' style='height: 12rem'>
                <div class='card-body pt-4 pb-4 mb-5'>
                    <h5 class='card-title fw-bold'>{$row['title']}</h5>
                    <hr class='my-2'>
                    <p class='card-text fw-light'><span class='fw-bold'>Author:</span> {$row['author_first_name']} {$row['author_last_name']}</p>
                    // The publisher name is included in the URL using urlencode() to make sure that if there are special characters that it does not break.
                    <p class='card-text fw-light'><span class='fw-bold'>Publisher:</span> <a href='publisher.php?publisher=" . urlencode($row['publisher_name']) . "'>{$row['publisher_name']}</a></p>
                    <p class='card-text fw-light'><span class='fw-bold'>Description:</span> {$row['short_description']}</p>
                    <p class='card-text fw-light'><span class='fw-bold'>Type:</span> {$row['type']}</p>
                    <p class='card-text fw-light'><span class='fw-bold'>Published Date:</span> {$row['publish_date']}</p>
                    <p class='card-text fw-light'><span class='fw-bold'>ISBN:</span> {$row['isbn_code']}</p>
                </div>
                <div class='btn-group position-absolute bottom-0 start-50 translate-middle-x mb-3'>
                    <a href='details.php?id={$row['id']}' class='btn btn-outline-info mx-2 rounded'>Details</a>
                    <a href='update.php?id={$row['id']}' class='btn btn-outline-warning mx-2 rounded'>Update</a>
                    <a href='delete.php?id={$row['id']}' class='btn btn-outline-danger mx-2 rounded'>Delete</a>
                </div>
            </div>
        </div>
        ";
    }
} else {
    $cards .= "No data found.";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Bai Jamjuree', sans-serif;
            background-color: #DEDEDE;
        }
    </style>
</head>

<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class="container">
        <h1 class="fw-bold text-center my-5 display-3">Books</h1>
        <hr class='my-2 mb-5'>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
            <?php echo $cards ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
