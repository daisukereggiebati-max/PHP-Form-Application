<?php

session_start();

// Retrieve the submitted name from the session.
$name = $_SESSION['name'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <main class="container">
        <p class="eyebrow">SESSION CHECK</p>
        <h1>Second Page</h1>

        <?php if ($name !== ''): ?>
            <h2 class="success">Session Retrieved Successfully!</h2>

            <p>
                Welcome,
                <strong>
                    <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
                </strong>.
            </p>

            <p>Your name was remembered using a PHP session.</p>
        <?php else: ?>
            <h2>No Session Data Found</h2>

            <p>Please submit the form first.</p>
        <?php endif; ?>

        <a class="button-link secondary" href="index.html">Back to Form</a>
    </main>
</body>
</html>
