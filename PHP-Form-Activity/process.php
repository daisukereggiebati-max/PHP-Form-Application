<?php

// Start the session
session_start();

// Get the submitted values
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$year_level = $_POST['year_level'] ?? '';


// Check if required fields are empty
if (
    empty($name) ||
    empty($email) ||
    empty($year_level)
) {

    echo "<h2>Validation Error</h2>";

    echo "<p>Please fill in all required fields.</p>";

    echo "<a href='index.html'>Go Back to Form</a>";

    exit;
}


// Store information in a PHP array
$student = [

    "Name" => $name,

    "Email" => $email,

    "Year Level" => $year_level

];


// Store the name in the session
$_SESSION['name'] = $name;

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Processing Result</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .success {
            color: green;
        }

        li {
            margin: 10px 0;
        }

        a {
            display: inline-block;
            margin-top: 15px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1 class="success">
        Form Submitted Successfully!
    </h1>

    <h2>
        Submitted Information
    </h2>

    <ul>

        <?php

        // Display the array using foreach
        foreach ($student as $key => $value) {

            echo "<li>";

            echo "<strong>$key:</strong> $value";

            echo "</li>";

        }

        ?>

    </ul>

    <p>
        Your information has been stored in the session.
    </p>

    <a href="second.php">
        Go to Second Page
    </a>

</div>

</body>

</html>