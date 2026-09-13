<?php

session_start();

// This page accepts data only from the form's POST submission.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    $errors = [
        'Please submit the form from the first page.',
    ];
} else {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $yearLevel = trim((string) ($_POST['year_level'] ?? ''));

    $allowedYearLevels = [
        '1st Year',
        '2nd Year',
        '3rd Year',
        '4th Year',
    ];

    $errors = [];

    if ($name === '') {
        $errors[] = 'Name is required.';
    }

    if ($email === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (!in_array($yearLevel, $allowedYearLevels, true)) {
        $errors[] = 'Please select a valid year level.';
    }

    if ($errors === []) {
        // Associative array required by the activity.
        $student = [
            'Name' => $name,
            'Email' => $email,
            'Year Level' => $yearLevel,
        ];

        // Store a submitted value explicitly, as required by the activity.
        $_SESSION['name'] = $name;

        // Keep the complete record available for possible future use.
        $_SESSION['student'] = $student;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $errors === [] ? 'Processing Result' : 'Validation Error' ?>
    </title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <main class="container">
        <p class="eyebrow">FORM PROCESSING</p>
        <?php if ($errors !== []): ?>
            <h1 class="error">Validation Error</h1>

            <p>
                Submission was not saved. Please correct the following:
            </p>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a class="button-link secondary" href="index.html">Back to Form</a>
        <?php else: ?>
            <h1 class="submission-success">Form Submitted Successfully!</h1>

            <h2>Submitted Information</h2>

            <ul>
                <?php foreach ($student as $key => $value): ?>
                    <li>
                        <strong>
                            <?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>:
                        </strong>

                        <?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p>Your information has been stored in the session.</p>

            <a class="button-link" href="second.php">Go to Second Page</a>
        <?php endif; ?>
    </main>
</body>
</html>
