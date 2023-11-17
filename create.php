<?php
require_once 'components/db_Connection.php';

if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $image = $_POST["image"];
    $isbn_code = $_POST["isbn_code"];
    $short_description = $_POST["short_description"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];

    $sql = "INSERT INTO `books`(`title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES ('$title', '$image', '$isbn_code', '$short_description', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date')";

    if (mysqli_query($conn, $sql)) {
        echo "
        <div class='alert alert-success mb-0' role='alert'>
            New entry was created.
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-danger mb-0' role='alert'>
            Something went wrong
        </div>
        ";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Bai Jamjuree', sans-serif;
            background-color: #DEDEDE;

        }

        .form-control {
            background-color: #FDF9F9;
            border: 1px solid #000000;
        }
    </style>

    <script>
        function checkFormLength() {
            var maxLengths = {
                'title': 255,
                'image': 255,
                'isbn_code': 13,
                'short_description': 50,
                'type': 4,
                'author_first_name': 50,
                'author_last_name': 50,
                'publisher_name': 100,
                'publisher_address': 255,
                'publish_date': 10,
                'status': 10
            };

            var form = document.forms["updateForm"];
            for (var fieldName in maxLengths) {
                var fieldValue = form.elements[fieldName].value;
                if (fieldValue.length > maxLengths[fieldName]) {
                    alert(fieldName + " exceeds the maximum limit of " + maxLengths[fieldName] + " characters.");
                    return false;
                }
            }

            return true;
        }
    </script>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>

    <div class="container">
        <h1 class="fw-bold text-center my-5 display-4">Create Entry</h1>
        <hr class='my-2 mb-5'>
    </div>
    <div class="container">
        <form action="" method="post" name="updateForm" onsubmit="return checkFormLength();">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control mb-2" required>

            <label for="image" class="form-label">Image (URL or file name):</label>
            <input type="text" name="image" class="form-control mb-2" required>

            <label for="isbn_code" class="form-label">ISBN Code:</label>
            <input type="text" name="isbn_code" class="form-control mb-2" required>

            <label for="short_description" class="form-label">Short Description:</label>
            <textarea name="short_description" class="form-control mb-2" required></textarea>

            <label for="type" class="form-label">Type (book, CD, DVD):</label>
            <select name="type" class="form-control mb-2" required>
                <option value="book">Book</option>
                <option value="CD">CD</option>
                <option value="DVD">DVD</option>
            </select>

            <label for="author_first_name" class="form-label">Author First Name:</label>
            <input type="text" name="author_first_name" class="form-control mb-2" required>

            <label for="author_last_name" class="form-label">Author Last Name:</label>
            <input type="text" name="author_last_name" class="form-control mb-2" required>

            <label for="publisher_name" class="form-label">Publisher Name:</label>
            <input type="text" name="publisher_name" class="form-control mb-2" required>

            <label for="publisher_address" class="form-label">Publisher Address:</label>
            <input type="text" name="publisher_address" class="form-control mb-2" required>

            <label for="publish_date" class="form-label">Publish Date:</label>
            <input type="date" name="publish_date" class="form-control mb-2" required>

            <input type="submit" value="Create" name="create" class="btn btn-primary mt-3 mb-5">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
