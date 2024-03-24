<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course PHP</title>
</head>

<body>
    <form action="index.php">
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" id="password" name="password">
        </div>
        <input type="submit" value="Login" />
    </form>
</body>

</html>

<?php
$day = 'Saturday';

$message = match ($day) {
    'Saturday', 'Sunday' => 'Enjoy the weekend!',
    'Weekday' => 'Back to the grind...',
    default => 'Invalid day',
};
echo $message;
?>