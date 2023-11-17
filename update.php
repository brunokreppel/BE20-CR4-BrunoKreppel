<?php
require_once 'components/db_Connection.php';
require_once 'components/navbar.php';

$displayAlert = false;
$displayForm = false;

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET['id'];
    
    $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = $id");

    if ($result) {
        // Check if data was retrieved successfully
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $title = $row['title'];
            $image = $row['image'];
            $isbn_code = $row['isbn_code'];
            $short_description = $row['short_description'];
            $type = $row['type'];
            $author_first_name = $row['author_first_name'];
            $author_last_name = $row['author_last_name'];
            $publisher_name = $row['publisher_name'];
            $publisher_address = $row['publisher_address'];
            $publish_date = $row['publish_date'];
            $status = $row['status'];

            $displayForm = true;
        } else {
            $displayAlert = true;
        }
    } else {
        $displayAlert = true;
    }
} else {
    $displayAlert = true;
}

// Check if the update form is submitted
if ($displayForm && isset($_POST["update"])) {
    // Retrieve form data
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
    $status = $_POST["status"];

    // Update the database with the new data
    $sql = "UPDATE `books` SET `title`='$title', `image`='$image', `isbn_code`='$isbn_code', `short_description`='$short_description', `type`='$type', `author_first_name`='$author_first_name', `author_last_name`='$author_last_name', `publisher_name`='$publisher_name', `publisher_address`='$publisher_address', `publish_date`='$publish_date', `status`='$status'  WHERE `id`='$id'";

    // Display success or error message based on the query result
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'>Entry was updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong with the update: " . mysqli_error($conn) . ".</div>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Entry</title>
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
        // cool function i made that is onSubmit. So that it runs before the php/sql thing. It controlls the max length of things that get pushed into the Database.
        // if the input is too long it returns false and fires an alert if not true and then the rest of the code runs.
        // you can still do querry incetion and delete my whole Database tho. at least i think so. so please dont :$
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
    <div class="container">
        <h1 class="fw-bold text-center my-5 display-4">Update Entry</h1>
        <hr class='my-2 mb-5'>
    </div>
    <div class="container">
        <?php
        // Display alert if data was not retrieved
        if ($displayAlert) {
            echo "<div class='alert alert-danger' role='alert'>Entry not found or error fetching data from the database.</div>";
        }

        // Display the form if the data was retrieved and  pre-fills the value of the input field with the corresponding data from the database
        if ($displayForm) {
        ?>
            <form action="" method="post" name="updateForm" onsubmit="return checkFormLength();"> 
                <label for="title" class="form-label fw-bold">Title:</label>
                <input type="text" name="title" class="form-control mb-2" value="<?php echo $title; ?>" required>  

                <label for="image" class="form-label fw-bold">Image (URL or file name):</label>
                <input type="text" name="image" class="form-control mb-2" value="<?php echo $image; ?>" required>

                <label for="isbn_code" class="form-label fw-bold">ISBN Code:</label>
                <input type="text" name="isbn_code" class="form-control mb-2" value="<?php echo $isbn_code; ?>" required>

                <label for="short_description" class="form-label fw-bold">Short Description:</label>
                <textarea name="short_description" class="form-control mb-2" required><?php echo $short_description; ?></textarea>

                <label for="type" class="form-label fw-bold">Type (book, CD, DVD):</label>
                <select name="type" class="form-control mb-2" required>
                    <option value="book" <?php echo ($type === 'book') ? 'selected' : ''; ?>>Book</option>
                    <option value="CD" <?php echo ($type === 'CD') ? 'selected' : ''; ?>>CD</option>
                    <option value="DVD" <?php echo ($type === 'DVD') ? 'selected' : ''; ?>>DVD</option>
                </select>

                <label for="author_first_name" class="form-label fw-bold">Author First Name:</label>
                <input type="text" name="author_first_name" class="form-control mb-2" value="<?php echo $author_first_name; ?>" required>

                <label for="author_last_name" class="form-label fw-bold">Author Last Name:</label>
                <input type="text" name="author_last_name" class="form-control mb-2" value="<?php echo $author_last_name; ?>" required>

                <label for="publisher_name" class="form-label fw-bold">Publisher Name:</label>
                <input type="text" name="publisher_name" class="form-control mb-2" value="<?php echo $publisher_name; ?>" required>

                <label for="publisher_address" class="form-label fw-bold">Publisher Address:</label>
                <input type="text" name="publisher_address" class="form-control mb-2" value="<?php echo $publisher_address; ?>" required>

                <label for="publish_date" class="form-label fw-bold">Publish Date:</label>
                <input type="date" name="publish_date" class="form-control mb-2" value="<?php echo $publish_date; ?>" required>

                <label for="status" class="form-label fw-bold">Status</label>
                <select name="status" class="form-control mb-2" required>
                    <option value="available" <?php echo ($status === 'available') ? 'selected' : ''; ?>>Available</option>
                    <option value="reserved" <?php echo ($status === 'reserved') ? 'selected' : ''; ?>>Reserved</option>
                </select>

                <input type="submit" value="Update" name="update" class="btn btn-primary mt-2 mb-5">
            </form>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o
