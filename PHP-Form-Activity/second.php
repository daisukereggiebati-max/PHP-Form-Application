<?php

// Start the session
session_start();

// Retrieve the name from the session
$name = $_SESSION['name'] ?? '';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Second Page</title>

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
            text-align: center;
        }

        .success {
            color: green;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>
        Second Page
    </h1>


    <?php if (!empty($name)): ?>

        <h2 class="success">

            Session Retrieved Successfully!

        </h2>


        <p>

            Welcome,

            <strong>

                <?php
                echo htmlspecialchars($name);
                ?>

            </strong>

        </p>


        <p>

            Your name was successfully remembered
            using a PHP session.

        </p>


    <?php else: ?>

        <h2>
            No Session Data Found
        </h2>

        <p>
            Please submit the form first.
        </p>

    <?php endif; ?>


    <a href="index.html">

        Back to Form

    </a>

</div>

</body>

</html>